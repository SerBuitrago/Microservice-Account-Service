<?php

namespace App\Services;

use App\Traits\RequestService;

class UserService
{
    use RequestService;

    public $baseUri;
    public $token;

    public function __construct()
    {
        $this->baseUri = config('services.microservices.user.base_uri');
        $this->token = config('services.microservices.user.base_uri.token');
    }
}