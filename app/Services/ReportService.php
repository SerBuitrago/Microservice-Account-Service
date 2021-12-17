<?php

namespace App\Services;

use App\Traits\RequestService;

class ReportService
{
    use RequestService;

    public $baseUri;
    public $token;

    public function __construct()
    {
        $this->baseUri = config('services.microservices.report.base_uri');
        $this->token = config('services.microservices.report.base_uri.token');
    }
}