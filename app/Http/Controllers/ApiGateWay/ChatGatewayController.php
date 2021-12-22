<?php

namespace App\Http\Controllers\ApiGateWay;

use App\Http\Controllers\Controller;
use App\Services\ChatService;
use Illuminate\Http\Request;

class ChatGatewayController extends Controller
{
    private $chatService;

    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    public function storeUser(Request $request)
    {
        $rules = [
            'username' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'password']
        ];
        $this->validate($request, $rules);

        try {
            return $this->successResponse($this->chatService->storeUser($request->all()));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function storeConversation(Request $request)
    {
        $rules = ['senderId' => ['required', 'numeric'], 'receiverId' => ['required', 'numeric']];
        $this->validate($request, $rules);

        try {
            return $this->successResponse($this->chatService->storeConversation($request->all()));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function storeMessage(Request $request)
    {
        $rules = [
            'sender' => ['required', 'numeric'],
            'text' => ['required', 'string'],
            'conversationId' => ['required', 'numeric']
        ];
        $this->validate($request, $rules);

        try {
            return $this->successResponse($this->chatService->storeMessage($request->all()));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function userConversations($id)
    {
        try {
            return $this->successResponse($this->chatService->userConversations($id));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function usersConversations($user1, $user2)
    {
        try {
            return $this->successResponse($this->chatService->usersConversations($user1, $user2));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function sendMessage(Request $request)
    {
        try {
            return $this->successResponse($this->chatService->sendMessage($request->all()));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function conversationMessages($id)
    {
        try {
            return $this->successResponse($this->chatService->conversationMessages($id));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }
}
