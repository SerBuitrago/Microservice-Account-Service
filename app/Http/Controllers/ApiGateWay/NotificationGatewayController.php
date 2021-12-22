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
        try {
            return $this->successResponse($this->notificationService->allNotificationsByUser($request->all(), $id));
        } catch (\Exception $error) {
            return response()->json(false, 500);
        }
    }

    public function destroyNotification(Request $request, $id)
    {
        $request->merge(['id' => $id]);

        $rules = ['id' => ['required', 'numeric']];
        $messages = ['id.required' => 'El identificador es requerido', 'id.integer' => 'El identificador debe de ser un entero.'];
        $this->validate($request,  $rules,  $messages);

        try {
            return $this->successResponse($this->notificationService->deleteNotificationById($request->get('id')));
        } catch (\Exception $error) {
            return response()->json(false, 500);
        }
    }

    public function storeNotification(Request $request)
    {
        $rules = [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'id_user' => ['required', 'numeric'],
            'id_sender' => ['numeric'],
            'id_type' => ['required', 'numeric']
        ];
        $this->validate($request,  $rules);
        try {
            return $this->successResponse($this->notificationService->storeNotification($request->all()));
        } catch (\Exception $error) {
            return response()->json(false, 500);
        }
    }

    public function updateNotification(Request $request)
    {
        $rules = [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'id_user' => ['required', 'numeric'],
            'id_sender' => ['numeric'],
            'id_type' => ['required', 'numeric'],
            'id_state' => ['required', 'booleanD']
        ];
        $this->validate($request,  $rules);

        return $this->successResponse($this->notificationService->updateNotification($request->all()));
    }

    public function storeUser(Request $request)
    {
        $rules = [
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'id_role' => ['required', 'numeric'],
        ];
        $this->validate($request,  $rules);

        return $this->successResponse($this->notificationService->storeUser($request->only(['fullname', 'email', 'id_role'])));
    }

    public function readingNotificationsByUserId(Request $request)
    {
        $rules = [
            'id' => ['required', 'numeric']
        ];
        $this->validate($request,  $rules);

        return $this->successResponse($this->notificationService->checkNotification($request->only('id')));
    }

    public function sendNotiToNumber(Request $request)
    {
        $rules = [
            'numero' => ['required'],
            'mensaje' => ['required', 'string']

        ];
        $this->validate($request,  $rules);

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
        $this->validate($request,  $rules);

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
        $this->validate($request,  $rules);

        return $this->successResponse($this->notificationService->sendMailAuditoria($request->all()));
    }
}
