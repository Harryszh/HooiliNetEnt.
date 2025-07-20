<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // ggf. mehr, z. B. 'login', 'logout'
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        'http://localhost:5173',
        // hier weitere URLs, falls nötig
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // *** GANZ WICHTIG ***
];

