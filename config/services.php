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
        ],
        'user' => [
            'base_uri' => env('HOST_MICROSERVICE_USER'),
            "services" => [
                "follow" => env('HOST_MICROSERVICE_USER')."/follow",
                "user" => env('HOST_MICROSERVICE_USER')."/user",
                "student" => env('HOST_MICROSERVICE_USER')."/student",
            ],
            "token" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c",
        ],
        'tutoring' => [
            'base_uri' => env('HOST_MICROSERVICE_TUTORING'),
            "services" => [
                "category" => env('HOST_MICROSERVICE_TUTORING')."/category",
                "subject" => env('HOST_MICROSERVICE_TUTORING')."/subject",
                "tutoring" => env('HOST_MICROSERVICE_TUTORING')."/tutoring",
            ],
            "token" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"
        ],
        'chat' => [
            'base_uri' => env('HOST_MICROSERVICE_CHAT'),
            "services" => [
            ],
            "token" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"
        ],
        'knowledge' => [
            'base_uri' => env('HOST_MICROSERVICE_KNOWLEDGE'),
            "services" => [
            ],
            "token" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"
        ],
        'audit' => [
            'base_uri' => env('HOST_MICROSERVICE_AUDIT'),
            "services" => [
                "audit" => env('HOST_MICROSERVICE_AUDIT')."/audit"
            ],
            "token" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"
        ],
        'notification' => [
            'base_uri' => env('HOST_MICROSERVICE_NOTIFICATIONS'),
            "services" => [
            ],
            "token" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"
        ],
        'report' => [
            'base_uri' => env('HOST_MICROSERVICE_REPORTS'),
            "services" => [
            ],
            "token" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"
        ]
    ]
];
