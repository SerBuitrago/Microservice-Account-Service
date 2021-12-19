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

    public function fetchReadAll($data)
    {
        return $this->request('POST', '/verNotificaciones', $data);
    }

    public function create($data)
    {
        return $this->request('POST', '/crearNotificacion', $data);
    }

    public function sendMailRegistro($data)
    {
        return $this->request('POST', '/sendMailRegistro', $data);
    }
}