<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    |Ici, vous pouvez configurer vos paramètres pour le partage des ressources croisées.
    |ou "Cors".Cela détermine quelles opérations de croix peuvent exécuter
    |dans les navigateurs Web.Vous êtes libre d'ajuster ces paramètres si nécessaire.si nécessaire.si nécessaire.si nécessaire.si nécessaire.si nécessaire.si nécessaire.si nécessaire.si nécessaire.si nécessaire.si nécessaire.si nécessaire.si nécessaire.si nécessaire.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => [
        'api/*', 'sanctum/csrf-cookie',
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
