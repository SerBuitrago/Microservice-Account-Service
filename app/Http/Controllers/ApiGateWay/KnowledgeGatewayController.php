<?php

namespace App\Http\Controllers\ApiGateWay;

use App\Http\Controllers\Controller;
use App\Services\KnowledgeService;
use Illuminate\Http\Request;

class KnowledgeGatewayController extends Controller
{
    private $knowledgeService;

    public function __construct(KnowledgeService $knowledgeService)
    {
        $this->knowledgeService = $knowledgeService;
    }

    public function storeUser(Request $request)
    {
        $rules = [
            'id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'code' => ['required', 'string']
        ];

        $this->validate($request, $rules);

        try {
            return $this->successResponse($this->knowledgeService->storeUser($request->all()));
        } catch (\Exception $error) {
            return response()->json(false, 500);
        }
    }

    public function loginInApp(Request $request)
    {
        $rules = ['api_token' => ['required', 'string']];

        $this->validate($request, $rules);

        try {
            $this->successResponse($this->knowledgeService->login($request->all()));
        } catch (\Exception $error) {
            return response()->json(false, 500);
        }
    }
}
