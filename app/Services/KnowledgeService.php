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

    public function storeUser($data)
    {
        return $this->request('POST', $this->baseUri . '/users', $data);
    }

    public function login($data)
    {
        return $this->request('POST', $this->baseUri . '/login', $data);
    }
}
