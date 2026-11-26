<?php

namespace App\Services\AI;

use App\Services\AI\GeminiService;
use Illuminate\Container\Attribute\InjectionName;

class AIService
{
    protected GeminiService $gemini;

    public function __construct()
    {
        $this->gemini = new GeminiService();
    }

    public function generateText(
        string $prompt,
        ?string $systemInstruction = null,
        array $history = []
    ): string {
        return $this->gemini->generateText($prompt, $systemInstruction, $history);
    }

    public function availableProviders(): array
    {
        return [
            'gemini' => config('ai.provider', 'gemini'),
        ];
    }
}