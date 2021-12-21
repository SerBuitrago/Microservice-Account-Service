<?php

namespace App\Http\Controllers\ApiGateWay;

use App\Events\UserRegisterEvent;
use App\Http\Controllers\Controller;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationGatewayController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function userNotifications(Request $request, $id)
    {
        return $this->successResponse($this->notificationService->allNotificationsByUser($request->all(), $id));
    }

    public function store(Request $request, $id)
    {
        return "Intentando guardar la notificación..";
        return $this->successResponse($this->notificationService->store($request->all(), $id));
    }

    public function sendMailRegistro(Request $request)
    {
        return $this->successResponse($this->notificationService->sendMailRegistro($request->all()));
    }
}
