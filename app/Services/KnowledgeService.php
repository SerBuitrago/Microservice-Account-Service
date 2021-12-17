<?php

namespace App\Services;

use App\Traits\RequestService;

class KnowledgeService
{
    use RequestService;

    public $baseUri;
    public $token;

    public function __construct()
    {
        $this->baseUri = config('services.microservices.knowledge.base_uri');
        $this->token = config('services.microservices.knowledge.base_uri.token');
    }
}