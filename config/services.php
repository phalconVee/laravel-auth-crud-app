<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1899037670339372',
        'client_secret' => 'd616af26c3bcae58ed12aa32e299a6af',
        'redirect' => 'http://localhost/laravel-auth-crud-app/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '729960387861-p6778qsma0pgd502rohiuqnh0agl0s11.apps.googleusercontent.com',
        'client_secret' => 'pEDtNo10s9IuRCYlYX_bxDp7',
        'redirect' => 'http://localhost/laravel-auth-crud-app/auth/google/callback',
    ],

];
