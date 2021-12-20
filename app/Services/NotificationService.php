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

    public function allNotificationsByUser($data, $user)
    {
        return $this->request('GET', $this->baseUri . '/usuarios/' . $user . '/notifications', $data);
    }

    public function store($data, $user)
    {
        return $this->request('POST', $this->baseUri . '/usuarios/' . $user . '/notifications', $data);
    }

    public function checkNotification($data, $user, $notification)
    {
        return $this->request('PATCH', $this->baseUri . '/usuarios/' . $user . '/notifications/' . $notification, $data);
    }

    public function sendMailRegistro($data)
    {
        return $this->request('POST', '/sendMailRegistro', $data);
    }

    public function sendNotiToNumber($data)
    {
        # code...
    }
}
