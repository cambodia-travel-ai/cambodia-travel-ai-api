<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidBase64Image implements ValidationRule
{
    /**
     * Allowed image MIME types.
     */
    protected array $allowedMimes = [
        'image/png',
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/webp',
    ];

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value)) {
            $fail('The :attribute must be a base64 encoded image string.');

            return;
        }

        $value = trim($value);

        // Support both raw base64 and data URI (data:image/png;base64,....)
        if (str_contains($value, ',')) {
            $value = substr($value, strpos($value, ',') + 1);
        }

        if ($value === '') {
            $fail('The :attribute is empty.');

            return;
        }

        $binary = base64_decode($value, true);

        if ($binary === false) {
            $fail('The :attribute is not a valid base64 string.');

            return;
        }

        $info = @getimagesizefromstring($binary);

        if ($info === false || ! in_array($info['mime'], $this->allowedMimes, true)) {
            $fail('The :attribute must be a valid image (png, jpg, jpeg, gif, webp).');
        }
    }
}