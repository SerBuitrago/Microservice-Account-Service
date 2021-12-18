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

    public function index(){
        return $this->successResponse($this->auditService->fetchReadAll());
    }

    public function fetchReadAll()
    {
        return $this->successResponse($this->auditService->fetchReadAll());
    }

    public function fetchRead($id)
    {
        return $this->successResponse($this->auditService->fetchRead($id));
    }

    public function create(Request $request){
        return $this->successResponse($this->auditService->create($request->all()));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->auditService->update($id, $request->all()));
    }

    public function delete($id)
    {
        return $this->successResponse($this->auditService->delete($id));
    }
}