<?php

return [
    'google' => [
        'client_id' => env('GOOGLE_KEY'),
        'client_secret' => env('GOOGLE_SECRET'),
        'redirect' => env('GOOGLE_CALLBACK'),
    ],
    'microservices' => [
        'example' => [
            'base_uri' => 'http://localhost:8100/api',
        ]
    ]
];
