<?php

namespace App\Services\AI;

use GuzzleHttp\Exception\ConnectException as ExceptionConnectException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Exception\ConnectException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\PoolException;
use InvalidArgumentException;
use JsonException;

class GeminiService
{
    protected string $apiKey;
    protected string $model;
    protected int $timeout;
    protected int $retries;
    protected int $maxOutputTokens;
    protected float $temperature;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.key');
        $this->model = config('services.gemini.model');
        $this->timeout = config('ai.timeout', 30);
        $this->retries = config('ai.retries', 3);
        $this->maxOutputTokens = config('ai.max_output_tokens', 2048);
        $this->temperature = config('ai.temperature', 0.7);
    }

    public function generateText(
        string $prompt,
        ?string $systemInstruction = null,
        array $history = []
    ): string {
        if (empty($this->apiKey)) {
            throw new \RuntimeException('Gemini API key not configured');
        }

        if (trim($prompt) === '') {
            throw new InvalidArgumentException('Prompt cannot be empty');
        }

        $attempts = 0;
        $lastException = null;

        while ($attempts < $this->retries) {
            try {
                $attempts++;

                $payload = $this->buildPayload($prompt, $systemInstruction, $history);

                $response = Http::withHeaders([
                    'x-goog-api-key' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ])
                    ->timeout($this->timeout)
                    ->post(
                        "https://generativelanguage.googleapis.com/v1beta/models/{$this->model}:generateContent?key={$this->apiKey}",
                        $payload
                    );

                return $this->processResponse($response);

            } catch (\Exception $e) {
                $lastException = $e;
                $isRetryable = $this->isRetryable($e);

                if (!$isRetryable || $attempts >= $this->retries) {
                    break;
                }

                // Exponential backoff
                sleep(min(2 * $attempts, 10));
            }
        }

        throw $lastException ?? new \RuntimeException('Gemini API request failed after all retries');
    }

    protected function buildPayload(
        string $prompt,
        ?string $systemInstruction,
        array $history
    ): array {
        $parts = [];

        if ($systemInstruction) {
            $parts[] = [
                'text' => $systemInstruction,
            ];
        }

        foreach ($history as $message) {
            $role = $message['role'] ?? 'user';
            $content = $message['message'] ?? '';

            if (empty(trim($content))) {
                continue;
            }

            // Convert assistant role to model for Gemini
            $geminiRole = $role === 'assistant' ? 'model' : 'user';
            $parts[] = [
                'role' => $geminiRole,
                'parts' => [['text' => $content]],
            ];
        }

        // Add the current user prompt as the final user message
        $parts[] = [
            'role' => 'user',
            'parts' => [['text' => $prompt]],
        ];

        return [
            'contents' => $parts,
            'generationConfig' => [
                'temperature' => $this->temperature,
                'maxOutputTokens' => $this->maxOutputTokens,
                'topP' => 1,
                'topK' => 1,
            ],
        ];
    }

    protected function processResponse(\Illuminate\Http\Client\Response $response): string
    {
        if ($response->failed()) {
            $this->handleHttpError($response);
        }

        $data = $response->json();

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Invalid JSON response from Gemini API');
        }

        if (isset($data['error'])) {
            $error = $data['error'];
            $message = $error['message'] ?? 'Unknown Gemini API error';
            $code = $error['code'] ?? 0;
            $this->handleGeminiError($code, $message);
        }

        if (!isset($data['candidates']) || empty($data['candidates'])) {
            throw new \RuntimeException('No candidates in Gemini response');
        }

        $candidate = $data['candidates'][0];

        if (isset($candidate['finishReason'])) {
            $finishReason = $candidate['finishReason'];
            if ($finishReason === 'SAFETY') {
                throw new \RuntimeException('Gemini response was blocked by safety filter');
            }
            if ($finishReason === 'MAX_OUTPUT_TOKENS') {
                throw new \RuntimeException('Gemini response hit max output tokens limit');
            }
        }

        if (!isset($candidate['content']['parts'][0]['text'])) {
            throw new \RuntimeException('No text content in Gemini candidate');
        }

        $text = $candidate['content']['parts'][0]['text'];

        if (trim($text) === '') {
            throw new \RuntimeException('Empty text response from Gemini API');
        }

        return $text;
    }

    protected function handleHttpError(\Illuminate\Http\Client\Response $response): never
    {
        $status = $response->status();

        switch ($status) {
            case 400:
                $exception = new \InvalidArgumentException(
                    'Bad request to Gemini API: ' . $response->body()
                );
                throw $exception;

            case 401:
            case 403:
                $exception = new \RuntimeException(
                    'Invalid Gemini API key'
                );
                throw $exception;

            case 429:
                $exception = new \RuntimeException(
                    'Gemini API rate limit exceeded'
                );
                throw $exception;

            case 500:
            case 502:
            case 503:
                $exception = new \RuntimeException(
                    'Gemini API server error'
                );
                throw $exception;

            default:
                $exception = new \RuntimeException(
                    "Gemini API returned status {$status}: " . $response->body()
                );
                throw $exception;
        }
    }

    protected function handleGeminiError(int $code, string $message): never
    {
        switch ($code) {
            case 400:
                throw new \InvalidArgumentException(
                    'Gemini API bad request: ' . $message
                );
            case 401:
            case 403:
                throw new \RuntimeException(
                    'Gemini API key invalid or unauthorized: ' . $message
                );
            case 429:
                throw new \RuntimeException(
                    'Gemini API rate limit exceeded: ' . $message
                );
            case 500:
            case 503:
                throw new \RuntimeException(
                    'Gemini API server error: ' . $message
                );
            default:
                throw new \RuntimeException(
                    'Gemini API error (' . $code . '): ' . $message
                );
        }
    }

    protected function isRetryable(\Exception $e): bool
    {
        $class = get_class($e);

        if ($class === ExceptionConnectException::class) {
            return true;
        }

        if ($e instanceof \Illuminate\Http\Client\RequestException) {
            return $this->isRetryableRequestException($e);
        }

        if ($e instanceof \RuntimeException) {
            $message = $e->getMessage();
            return str_contains($message, 'rate limit')
                || str_contains($message, 'timeout')
                || str_contains($message, 'server error')
                || str_contains($message, 'temporary');
        }

        return false;
    }

    protected function isRetryableRequestException(\Illuminate\Http\Client\RequestException $e): bool
    {
        $message = $e->getMessage();

        if (str_contains($message, '429')) {
            return true;
        }

        if (str_contains($message, 'connect') || str_contains($message, 'network')) {
            return true;
        }

        if (str_contains($message, 'timeout')) {
            return true;
        }

        return false;
    }
}
