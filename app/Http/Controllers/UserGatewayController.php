<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserGatewayController extends Controller
{
    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
}