<?php

return [

    /*
    |--------------------------------------------------------------------------
    | AI Provider Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration determines which AI provider the application uses.
    | Currently, only "gemini" is supported. OpenAI integration will be
    | added in future releases.
    |
    */

    'provider' => env('AI_PROVIDER', 'gemini'),

    /*
    |--------------------------------------------------------------------------
    | Gemini Configuration
    |--------------------------------------------------------------------------
    |
    | These settings are used when the Gemini AI provider is selected.
    | They are defined in config/services.php under the "gemini" key.
    |
    */

    'gemini' => [
        'model' => env('GEMINI_MODEL', 'gemini-2.5-flash'),
    ],

    'timeout' => env('AI_TIMEOUT', 30),
    'retries' => env('AI_RETRIES', 3),
    'max_output_tokens' => env('AI_MAX_OUTPUT_TOKENS', 2048),
    'temperature' => env('AI_TEMPERATURE', 0.7),

];