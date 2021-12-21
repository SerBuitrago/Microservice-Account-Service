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

    public function showNotification(Request $request, $id)
    {
        return $this->successResponse($this->notificationService->allNotificationsByUser($request->all(), $id));
    }

    public function destroyNotification(Request $request, $id)
    {
        $request->merge(['id' => $id]);

        $rules = ['id' => ['required', 'integer']];
        $messages = ['id.required' => 'El identificador es requerido', 'id.integer' => 'El identificador debe de ser un entero.'];
        $this->validate(request: $request, rules: $rules, messages: $messages);

        return $this->successResponse($this->notificationService->deleteNotificationById($request->get('id')));
    }

    public function storeNotification(Request $request)
    {
        $rules = [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'id_user' => ['required', 'integer'],
            'id_sender' => ['integer'],
            'id_type' => ['required', 'id_type']
        ];
        $this->validate(request: $request, rules: $rules);

        return $this->successResponse($this->notificationService->storeNotification($request->all()));
    }

    public function updateNotification(Request $request)
    {
        $rules = [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'id_user' => ['required', 'integer'],
            'id_sender' => ['integer'],
            'id_type' => ['required', 'id_type']
        ];
        $this->validate(request: $request, rules: $rules);

        return $this->successResponse($this->notificationService->updateNotification($request->all()));
    }

    public function storeUser(Request $request)
    {
        $rules = [
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'id_role' => ['required', 'integer'],
        ];
        $this->validate(request: $request, rules: $rules);

        return $this->successResponse($this->notificationService->storeUser($request->only(['fullname', 'email', 'id_role'])));
    }

    public function readingNotificationsByUserId(Request $request)
    {
        $rules = [
            'id' => ['required', 'integer']
        ];
        $this->validate(request: $request, rules: $rules);

        return $this->successResponse($this->notificationService->checkNotification($request->only('id')));
    }

    public function sendNotiToNumber(Request $request)
    {
        $rules = [
            'numero' => ['required'],
            'mensaje' => ['required', 'string']

        ];
        $this->validate(request: $request, rules: $rules);

        return $this->successResponse($this->notificationService->sendNotiToNumber($request->all()));
    }

    public function sendMailAsesoria(Request $request)
    {
        $rules = [
            'email' => ['required', 'email'],
            'username' => ['required', 'string'],
            'teacher_name' => ['required', 'string'],
            'hora' => ['required', 'string']
        ];
        $this->validate(request: $request, rules: $rules);

        return $this->successResponse($this->notificationService->sendMailAsesoria($request->all()));
    }

    public function sendMailAuditoria(Request $request)
    {
        $rules = [
            'email' => ['required', 'email'],
            'username' => ['required', 'string'],
            'teacher_name' => ['required', 'string'],
            'hora' => ['required', 'string']
        ];
        $this->validate(request: $request, rules: $rules);

        return $this->successResponse($this->notificationService->sendMailAuditoria($request->all()));
    }
}
