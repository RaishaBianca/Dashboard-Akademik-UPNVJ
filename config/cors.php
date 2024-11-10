<?php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout'],
    
    'allowed_methods' => ['*'],
    
    'allowed_origins' => ['http://localhost:3000', 'http://192.168.0.174:8000', 'http://localhost:*',   'http://localhost:8000', 'http://192.168.0.125:8000/', 'http://localhost:58554', ' https://b08d-180-252-86-226.ngrok-free.app'],
    
    'allowed_origins_patterns' => [],
    
    'allowed_headers' => ['*'],
    
    'exposed_headers' => [],
    
    'max_age' => 120,
    
    'supports_credentials' => true,
];