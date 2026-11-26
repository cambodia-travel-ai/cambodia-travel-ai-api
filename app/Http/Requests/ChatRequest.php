<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'message' => ['required', 'string', 'min:1', 'max:1000'],
        ];

        if ($this->conversation_id) {
            $userId = auth()->check() ? auth()->id() : null;
            $rules['conversation_id'] = [
                'required',
                Rule::exists('chat_conversations', 'id')->where(function ($query) use ($userId) {
                    if ($userId) {
                        $query->where('user_id', $userId);
                    } else {
                        $query->whereNull('user_id');
                    }
                }),
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'message.required' => 'The message field is required.',
            'message.string' => 'The message must be a string.',
            'message.min' => 'The message must be at least 1 character.',
            'message.max' => 'The message must not be greater than 1000 characters.',
            'conversation_id.exists' => 'The conversation does not exist or does not belong to you.',
        ];
    }
}