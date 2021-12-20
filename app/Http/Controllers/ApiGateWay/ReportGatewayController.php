<?php

namespace App\Http\Controllers\ApiGateWey;

use App\Http\Controllers\Controller;
use App\Services\ReportService;
use Illuminate\Http\Request;

class ReportGatewayController extends Controller
{
    private $reportService;

    public function __construct(ReportService $reportService){
        $this->reportService = $reportService;
    }

    public function index(){
        // TODO
        
    }
}