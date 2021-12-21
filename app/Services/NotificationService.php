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
        return $this->request('GET', $this->baseUri . '/usuarios/notifications/' . $user, $data);
    }

    public function deleteNotificationById($id)
    {
        return $this->request('DELETE', $this->baseUri . "/usuarios/notifications/delete/{$id}");
    }

    public function storeNotification($data)
    {
        return $this->request('POST', $this->baseUri . '/usuarios/notifications', $data);
    }

    public function updateNotification($data)
    {
        return $this->request('PUT', $this->baseUri . '/usuarios/notifications', $data);
    }

    public function storeUser($data)
    {
        return $this->request('POST', $this->baseUri . '/usuarios/crear', $data);
    }

    public function checkNotification($data)
    {
        return $this->request('PATCH', $this->baseUri . '/usuarios/readingNotifications/', $data);
    }

    public function sendNotiToNumber($data)
    {
        return $this->request('POST', $this->baseUri . '/sendNotiToNumber', $data);
    }

    public function sendMailAsesoria($data)
    {
        return $this->request('POST', $this->baseUri . '/sendMailAsesoria', $data);
    }

    public function sendMailAuditoria($data)
    {
        return $this->request('POST', $this->baseUri . '/sendMailAuditoria', $data);
    }
}
