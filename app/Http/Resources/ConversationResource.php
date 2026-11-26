<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConversationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'last_message' => $this->last_message ?? null,
            'updated_at' => $this->updated_at->toISOString(),
            'messages' => $this->whenLoaded('messages'),
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'resource_type' => 'conversation',
            ],
        ];
    }
}