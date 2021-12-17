<?php

namespace App\Http\Controllers;

use App\Services\TutoringService;
use Illuminate\Http\Request;

class TutoringGatewayController extends Controller
{
    private $tutoringService;

    public function __construct(TutoringService $tutoringService){
        $this->tutoringService = $tutoringService;
    }
}