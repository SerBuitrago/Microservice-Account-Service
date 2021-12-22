<?php

namespace App\Services;

use App\Traits\RequestService;

class ChatService
{
    use RequestService;

    public $baseUri;
    public $token;

    public function __construct()
    {
        $this->baseUri = config('services.microservices.chat.base_uri');
        $this->token = config('services.microservices.chat.base_uri.token');
    }

    public function storeUser($data)
    {
        return $this->request('POST', $this->baseUri . '/api/auth/register', $data);
    }
    
    public function storeConversation($data)
    {
        return $this->request('POST', $this->baseUri . '/api/conversations', $data);
    }
   
    public function storeMessage($data)
    {
        return $this->request('POST', $this->baseUri . '/api/messages', $data);
    }

    public function userConversations($user)
    {
        return $this->request('GET', $this->baseUri . "/api/conversations/{$user}");
    }

    public function usersConversations($user1, $user2)
    {
        return $this->request('GET', $this->baseUri . "/api/conversations/find/{$user1}/{$user2}");
    }

    public function sendMessage($data)
    {
        return $this->request('POST', $this->baseUri . '/api/messages', $data);
    }

    public function conversationMessages($id)
    {
        return $this->request('GET', $this->baseUri . "/api/messages/{$id}");
    }
}
