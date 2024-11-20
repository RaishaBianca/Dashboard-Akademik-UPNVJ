<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http://127.0.0.1:8000', 'http://localhost:8000', 'http://localhost:*', 'https://dfca-180-252-162-159.ngrok-free.app', ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => ['*'],

    'max_age' => 120,

    'supports_credentials' => true,

];