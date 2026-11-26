<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatRequest;
use App\Http\Resources\ConversationResource;
use App\Models\ChatConversation;
use App\Models\ChatMessage;
use App\Services\AI\AIService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class AIChatController extends Controller
{
    protected AIService $ai;

    public function __construct()
    {
        $this->ai = new AIService();
    }

    /**
     * Send a message to the AI assistant.
     *
     * POST /api/ai/chat
     *
     * @param ChatRequest $request
     * @return JsonResponse
     */
    public function store(ChatRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $conversationId = $validated['conversation_id'] ?? null;
        $isAuthenticated = auth()->check();

        // Retrieve previous conversation messages ONLY if authenticated
        $history = [];
        if ($isAuthenticated && $conversationId !== null) {
            $conversation = ChatConversation::where('id', $conversationId)
                ->where('user_id', auth()->id())
                ->with('messages')
                ->first();

            if ($conversation) {
                foreach ($conversation->messages as $msg) {
                    $history[] = [
                        'role' => $msg['role'],
                        'message' => $msg['message'],
                    ];
                }
            }
        }

        // Add the current user message to history
        // (history contains previous messages only; current prompt passed separately)

        try {
            // Send the prompt and conversation history to AI
            $aiResponse = $this->ai->generateText(
                $validated['message'],
                null, // System instruction is internal, not user-overridable
                array_map(fn($m) => ['role' => $m['role'], 'message' => $m['message']], $history)
            );

            // Without authentication, skip DB storage and return immediately
            if (! $isAuthenticated) {
                return response()->json([
                    'conversation_id' => $conversationId,
                    'user_message' => $validated['message'],
                    'ai_response' => $aiResponse,
                ]);
            }

            // Create conversation if needed (authenticated only)
            if ($conversationId === null) {
                $conversation = ChatConversation::create([
                    'user_id' => auth()->id(),
                    'title' => Str::limit($validated['message'], 50),
                ]);
                $conversationId = $conversation->id;
            }

            // Store the user message (authenticated only)
            ChatMessage::create([
                'conversation_id' => $conversationId,
                'role' => 'user',
                'message' => $validated['message'],
            ]);

            // Store the AI response (authenticated only)
            ChatMessage::create([
                'conversation_id' => $conversationId,
                'role' => 'assistant',
                'message' => $aiResponse,
            ]);

            // Return conversation ID, user message, and AI response
            return response()->json([
                'conversation_id' => $conversationId,
                'user_message' => $validated['message'],
                'ai_response' => $aiResponse,
            ]);
        } catch (\RuntimeException $e) {
            // Handle Gemini API failures gracefully
            \Log::error('Gemini AI error: ' . $e->getMessage());

            return response()->json([
                'error' => 'Unable to generate AI response at this time. Please try again.',
                'code' => 'AI_SERVICE_ERROR',
            ], 500);
        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => 'INVALID_PROMPT',
            ], 422);
        }
    }

    /**
     * Get the authenticated user's conversations.
     *
     * GET /api/ai/conversations
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (! auth()->check()) {
            return response()->json([
                'data' => [],
            ]);
        }

        $conversations = ChatConversation::where('user_id', auth()->id())
            ->withCount('messages')
            ->latest('updated_at')
            ->paginate(10);

        return response()->json([
            'data' => ConversationResource::collection($conversations),
        ]);
    }

    /**
     * Get one conversation with its messages.
     *
     * GET /api/ai/conversations/{id}
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        if (! auth()->check()) {
            return response()->json([
                'data' => null,
            ]);
        }

        $conversation = ChatConversation::where('id', $id)
            ->where('user_id', auth()->id())
            ->with('messages')
            ->firstOrFail();

        return response()->json([
            'data' => new ConversationResource($conversation),
        ]);
    }
}
