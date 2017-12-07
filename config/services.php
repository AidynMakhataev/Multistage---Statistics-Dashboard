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
    'facebook_poster' => [
        'app_id' => env('FACEBOOK_APP_ID', '2048856832067964'),
        'app_secret' => env('FACEBOOK_APP_SECRET', '38d2a9cf68f231469f42a8f1811f93dd'),
        'access_token' => env('FACEBOOK_ACCESS_TOKEN', 'EAAdHbKeryXwBAIJU3or76mAfUaD47RWSzioSa8c68KidSgzU4Eg984T27oGe3TyYBuuvSBS7cO3PWCNzaS7FZBKDn9easXlnCNjTZCmJMjX7a5tvTfZCVXHNvSDiojYefj0I0ilKl7pVL33sZBQ1et3ARew1x5TtdpCZBLZABsZAwYLRWhXhVILtOBoz8ZAxiAUZD'),
    ]

];
