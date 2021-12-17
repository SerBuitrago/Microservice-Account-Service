<?php

namespace App\Services;

use App\Traits\RequestService;

class NotificationService
{
    use RequestService;

    public $baseUri;
    public $token;

    public function __construct()
    {
        $this->baseUri = config('services.microservices.notification.base_uri');
        $this->token = config('services.microservices.notification.base_uri.token');
    }
}