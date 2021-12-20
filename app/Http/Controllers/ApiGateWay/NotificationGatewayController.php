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

    public function userNotifications(Request $request, $token)
    {
        event(new UserRegisterEvent);
        return "hola";
        // return $this->successResponse($this->notificationService->allNotificationsByUser($request->all(), $token));
    }

    public function store(Request $request, $token)
    {
        return "Intentando guardar la notificación..";
        return $this->successResponse($this->notificationService->store($request->all(), $token));
    }

    public function sendMailRegistro(Request $request)
    {
        return $this->successResponse($this->notificationService->sendMailRegistro($request->all()));
    }
}
