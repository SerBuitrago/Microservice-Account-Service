<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService){
        $this->notificationService = $notificationService;
    }
}