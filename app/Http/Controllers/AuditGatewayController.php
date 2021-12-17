<?php

namespace App\Http\Controllers;

use App\Services\AuditService;
use Illuminate\Http\Request;

class AuditGatewayController extends Controller
{
    private $auditService;

    public function __construct(AuditService $auditService){
        $this->auditService = $auditService;
    }
}