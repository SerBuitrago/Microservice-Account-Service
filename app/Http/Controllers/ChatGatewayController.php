<?php

namespace App\Http\Controllers;

use App\Services\ChatService;
use Illuminate\Http\Request;

class ChatGatewayController extends Controller
{
    private $chatService;

    public function __construct(ChatService $chatService){
        $this->chatService = $chatService;
    }
}