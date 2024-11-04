<?php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout'],
    
    'allowed_methods' => ['*'],
    
    'allowed_origins' => ['http://localhost:3000', 'http://192.168.1.148:8000', 'http://localhost:*',   'http://localhost:8000', 'http://127.0.0.1:8000/', 'http://localhost:5173'],
    
    'allowed_origins_patterns' => [],
    
    'allowed_headers' => ['*'],
    
    'exposed_headers' => [],
    
    'max_age' => 120,
    
    'supports_credentials' => true,
];