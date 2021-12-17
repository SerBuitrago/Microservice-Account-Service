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

    public function fetchReadAll()
    {
        return $this->request('GET', '/');
    }

    public function fetchRead($id)
    {
        return $this->request('GET', "/{$id}");
    }

    public function create($data)
    {
        return $this->request('POST', '/', $data);
    }

    public function update($id, $data)
    {
        return $this->request('PUT', "/{$id}", $data);
    }

    public function delete($id)
    {
        return $this->request('DELETE', "/{$id}");
    }
}