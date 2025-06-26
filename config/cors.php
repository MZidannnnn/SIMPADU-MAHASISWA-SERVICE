<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:5173',
        'https://ti054d04.agussbn.my.id',
        'https://ti054d03.agussbn.my.id',
        'https://ti054d02.agussbn.my.id',
        'https://ti054d01.agussbn.my.id',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
