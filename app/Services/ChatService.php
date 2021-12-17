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
}