<?php

namespace App\Http\Controllers;

use App\Services\KnowledgeService;
use Illuminate\Http\Request;

class KnowledgeGatewayController extends Controller
{
    private $knowledgeService;

    public function __construct(KnowledgeService $knowledgeService){
        $this->knowledgeService = $knowledgeService;
    }

    public function index(){
        
    }
}