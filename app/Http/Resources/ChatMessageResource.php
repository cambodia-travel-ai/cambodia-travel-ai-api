<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatMessageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'role' => $this->role,
            'message' => $this->message,
            'created_at' => $this->created_at->toISOString(),
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'resource_type' => 'chat_message',
            ],
        ];
    }
}