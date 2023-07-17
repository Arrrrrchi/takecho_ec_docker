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

    'stripe' => [
        'public' => env('STRIPE_PUBLIC_KEY'),
        'secret' => env('STRIPE_SECRET_KEY'),
    ],

    'meta' => [
        'id' => env('META_APP_ID'),
        'secret' => env('META_APP_SECRET'),
        'token' => env('META_ACCESS_TOKEN'),
        'unlimit_token' => env('META_ACCESS_TOKEN_UNLIMIT'),
    ],

    'instagram' => [
        'id' => env('INSTA_BUSINESS_ID'),
        'token' => env('INSTA_ACCESS_TOKEN'),
        'target_user' => env('INSTA_TARGET_USER'),
    ],

    'youtube' => [
        'api' => env('GOOGLE_YOUTUBE_API'),
        'channel_id' => env('YOUTUBE_CHANNEL_ID'),
        'play_list_id' => env('YOUTUBE_PLAY_LIST_ID'),
    ],
];
