<?php

return [
    'google' => [
        'client_id' => env('GOOGLE_KEY'),
        'client_secret' => env('GOOGLE_SECRET'),
        'redirect' => env('GOOGLE_CALLBACK'),
    ],
    'microservices' => [
        'user' => [
            'base_uri' => env('HOST_MICROSERVICE_USER'),
            "token" => env('TOKEN_MICROSERVICE_USER'),
        ],
        'tutoring' => [
            'base_uri' => env('HOST_MICROSERVICE_TUTORING'),
            "token" => env('TOKEN_MICROSERVICE_TUTORING')
        ],
        'chat' => [
            'base_uri' => env('HOST_MICROSERVICE_CHAT'),
            "token" => env('TOKEN_MICROSERVICE_TUTORING')
        ],
        'knowledge' => [
            'base_uri' => env('HOST_MICROSERVICE_KNOWLEDGE'),
            "token" => env('TOKEN_MICROSERVICE_TUTORING')
        ],
        'audit' => [
            'base_uri' => env('HOST_MICROSERVICE_AUDIT'),
            "token" => env('TOKEN_MICROSERVICE_TUTORING')
        ],
        'notification' => [
            'base_uri' => env('HOST_MICROSERVICE_NOTIFICATIONS'),
            "token" => env('TOKEN_MICROSERVICE_TUTORING')
        ],
        'report' => [
            'base_uri' => env('HOST_MICROSERVICE_REPORTS'),
            "token" => env('TOKEN_MICROSERVICE_TUTORING')
        ]
    ]
];
