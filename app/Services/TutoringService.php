<?php

namespace App\Services;

use App\Traits\RequestService;

class TutoringService
{
    use RequestService;

    public $baseUri;
    public $token;

    public function __construct()
    {
        $this->baseUri = config('services.microservices.tutoring.base_uri');
        $this->token = config('services.microservices.tutoring.base_uri.token');
    }
}