<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [
        'client_id' => '34fca4c2c23b0c90593f',
        'client_secret' => 'a41e1e74ff16cc30ee03017333c378906ab89d10',
        'redirect' => 'http://localhost:8000/auth/callback/github',
      ], 

    'google' => [
        'client_id' => '636108497429-ne9svkb1bv4gsgrd82a7kn9tt4mr065s.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/callback/google',
    ],

];
