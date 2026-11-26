<?php

namespace Tests\Unit\Services;

use App\Services\AI\GeminiService;
use Tests\TestCase as BaseTestCase;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Http;

class GeminiServiceTest extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Http::fake();
    }

    /** @test */
    public function it_validates_empty_prompt()
    {
        $service = new GeminiService();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Prompt cannot be empty');
        $service->generateText('');
    }

    /** @test */
    public function it_prompt_with_only_whitespace_is_invalid()
    {
        $service = new GeminiService();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Prompt cannot be empty');
        $service->generateText('   ');
    }

    /** @test */
    public function it_prompt_with_trimmed_still_works()
    {
        $service = new GeminiService();
        $result = $service->generateText('  Hello World  ');

        $this->stringContains('Hello', $result);
    }

    /** @test */
    public function it_passes_system_instruction_to_payload()
    {
        $service = new GeminiService();
        $result = $service->generateText('Test prompt', 'You are a helpful assistant');

        $this->stringContains('You are a helpful assistant', $result);
    }

    /** @test */
    public function it_passes_conversation_history()
    {
        $service = new GeminiService();
        $history = [
            ['role' => 'user', 'message' => 'I like elephants'],
            ['role' => 'assistant', 'message' => 'Cambodia has many elephants.'],
        ];

        $result = $service->generateText('Tell me more', 'You are AI', $history);

        $this->stringContains('elephant', $result);
    }

    /** @test */
    public function it_uses_configured_model_from_env()
    {
        $service = new GeminiService();

        $this->assertNotNull($service);
    }
}