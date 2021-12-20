<?php

$hostTutoring = env('HOST_MICROSERVICE_TUTORING');
$hostNotification = env('HOST_MICROSERVICE_NOTIFICATIONS');

return [
    'google' => [
        'client_id' => env('GOOGLE_KEY'),
        'client_secret' => env('GOOGLE_SECRET'),
        'redirect' => env('GOOGLE_CALLBACK'),
    ],
    'microservices' => [
        'tutoring' => [
            'base_uri' => $hostTutoring,
            "token" => env('TOKEN_MICROSERVICE_TUTORING'),
            'endpoints' => [
                'tema' => [
                    'list' => $hostTutoring . '/tutoriaServicio/tema/list',
                    'show' => $hostTutoring . '/tutoriaServicio/tema/busquedaNombre',
                    'save' => $hostTutoring . '/tutoriaServicio/tema/save',
                    'update' => $hostTutoring . '/tutoriaServicio/tema',
                    'delete' => $hostTutoring . '/tutoriaServicio/tema/delete',
                ],
                'tutoria' => [
                    'list' => $hostTutoring . '/tutoriaServicio/tutoria/list',
                    'show' => $hostTutoring . '/tutoriaServicio/tutoria/busquedaNombre',
                    'save' => $hostTutoring . '/tutoriaServicio/tutoria/save',
                    'update' => $hostTutoring . '/tutoriaServicio/tutoria',
                    'delete' => $hostTutoring . '/tutoriaServicio/tutoria/delete',
                    'finished_list' => $hostTutoring . '/tutoriaServicio/tutoria/list/terminadas',
                    'active_list' => $hostTutoring . '/tutoriaServicio/tutoria/list/activas',
                    'end_tutoria' => $hostTutoring . '/tutoriaServicio/tutoria/delete',
                    'subscribe' => $hostTutoring . '/tutoriaServicio/tutoria/inscribirse',
                ],
                'categoria' => [
                    'list' => $hostTutoring . '/tutoriaServicio/categoria/list',
                    'show' => $hostTutoring . '/tutoriaServicio/categoria/busquedaNombre',
                    'save' => $hostTutoring . '/tutoriaServicio/categoria/save',
                    'update' => $hostTutoring . '/tutoriaServicio/categoria',
                    'delete' => $hostTutoring . '/tutoriaServicio/categoria/delete',
                ],
                'rol_tutoria' => [
                    'save' => $hostTutoring . '/usuario/rol',

                ]
            ]
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
            'base_uri' => $hostNotification,
            "token" => env('TOKEN_MICROSERVICE_TUTORING'),
        ],
        'report' => [
            'base_uri' => env('HOST_MICROSERVICE_REPORTS'),
            "token" => env('TOKEN_MICROSERVICE_TUTORING')
        ]
    ]
];
