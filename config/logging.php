<?php

use Monolog\Handler\StreamHandler;
use Rollbar\Laravel\MonologHandler;

return [
    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('API_LOG_CHANNEL', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [

        'production' => [
            'driver' => 'stack',
            'channels' => ['rollbar','daily','stderr'],
        ],

        'development' => [
            'driver' => 'stack',
            'channels' => ['daily'],
        ],        
        
        'rollbar' => [
            'driver' => 'monolog',
            'handler' => MonologHandler::class,
            'access_token' => env('ROLLBAR_TOKEN'),
            'code_version' => env('VERSION_TAG', 'latest'),
            'environment' => env('EJ_ENV', env('API_ENV'), env('APP_ENV')) ?? 'production',
            'enable_utf8_sanitization' => false,            
            'level' => 'debug',
        ],     

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => 'debug',
            'days' => 7,
        ],    

        'stderr' => [
            'driver' => 'monolog',
            'handler' => StreamHandler::class,
            'level' => 'debug',
            'with' => [
                'stream' => 'php://stderr',
            ],
        ],        

        // There are other drivers available as well
        // 'slack' => [
        //     'driver' => 'slack',
        //     'url' => env('LOG_SLACK_WEBHOOK_URL'),
        //     'username' => 'Laravel Log',
        //     'emoji' => ':boom:',
        //     'level' => 'critical',
        // ],
        
    ],

];