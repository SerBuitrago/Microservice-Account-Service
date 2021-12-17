<?php

namespace App\Services;

use App\Traits\RequestService;

class AuditService
{
    use RequestService;

    public $baseUri;
    public $token;

    public function __construct()
    {
        $this->baseUri = config('services.microservices.audit.base_uri');
        $this->token = config('services.microservices.audit.base_uri.token');
    }
}