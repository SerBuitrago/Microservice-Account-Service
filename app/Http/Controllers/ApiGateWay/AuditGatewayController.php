<?php

namespace App\Http\Controllers\ApiGateWay;

use App\Http\Controllers\Controller;
use App\Services\AuditService;
use Illuminate\Http\Request;

class AuditGatewayController extends Controller
{
    private $auditService;

    public function __construct(AuditService $auditService)
    {
        $this->auditService = $auditService;
    }

    public function list()
    {
        try {
            return $this->successResponse($this->auditService->fetchReadAll());
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            return $this->successResponse($this->auditService->fetchRead($id));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $rules = [
            
        ];
        $this->validate($request, $rules);
        try {
            return $this->successResponse($this->auditService->create($request->all()));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->successResponse($this->auditService->update($id, $request->all()));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            return $this->successResponse($this->auditService->delete($id));
        } catch (\Exception $error) {
            return response()->json(['response' => $error->getMessage()], 500);
        }
    }
}
