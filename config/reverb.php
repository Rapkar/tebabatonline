<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Reverb Server
    |--------------------------------------------------------------------------
    |
    | This option controls the default server used by Reverb to handle
    | incoming messages as well as broadcasting message to all your
    | connected clients. At this time only "reverb" is supported.
    |
    */

    'default' => env('REVERB_SERVER', 'reverb'),

    /*
    |--------------------------------------------------------------------------
    | Reverb Servers
    |--------------------------------------------------------------------------
    |
    | Here you may define details for each of the supported Reverb servers.
    | Each server has its own configuration options that are defined in
    | the array below. You should ensure all the options are present.
    |
    */

    'servers' => [

        'reverb' => [
            'driver' => 'reverb',
            'host' => env('REVERB_SERVER_HOST', '127.0.0.1'), // The host address for the Reverb server
            'port' => env('REVERB_SERVER_PORT', 8080), // The port on which the Reverb server listens
            'hostname' => env('REVERB_HOST'), // The hostname for the server (usually your domain or IP)
            'allowed_origins' => ['*'],
            'max_request_size' => env('REVERB_MAX_REQUEST_SIZE', 10_000), // Maximum request size in bytes
            'scaling' => [
                'enabled' => env('REVERB_SCALING_ENABLED', false), // Whether scaling is enabled
                'channel' => env('REVERB_SCALING_CHANNEL', 'reverb'), // Channel for scaling
                'server' => [
                    'url' => env('REDIS_URL'), // URL for Redis server (if using Redis for scaling)
                    'host' => env('REDIS_HOST', '127.0.0.1'), // Host for Redis server
                    'port' => env('REDIS_PORT', '8080'), // Port for Redis server
                    'username' => env('REDIS_USERNAME'), // Redis username (if applicable)
                    'password' => env('REDIS_PASSWORD'), // Redis password (if applicable)
                    'database' => env('REDIS_DB', '0'), // Database number for Redis
                ],
            ],

            'pulse_ingest_interval' => env('REVERB_PULSE_INGEST_INTERVAL', 15), // Ingest interval for pulse data
            'telescope_ingest_interval' => env('REVERB_TELESCOPE_INGEST_INTERVAL', 15), // Ingest interval for Telescope data
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Reverb Applications
    |--------------------------------------------------------------------------
    |
    | Here you may define how Reverb applications are managed. If you choose
    | to use the "config" provider, you may define an array of apps which
    | your server will support, including their connection credentials.
    |
    */

    'apps' => [

        'provider' => 'config',

        'apps' => [
            [
                'key' => env('REVERB_APP_KEY'),
                'secret' => env('REVERB_APP_SECRET'),
                'app_id' => env('REVERB_APP_ID'),
                'allowed_origins' => ['*'],
                'options' => [
                    'host' => env('REVERB_HOST'),
                    'port' => env('REVERB_PORT',6001),
                    'scheme' => env('REVERB_SCHEME', 'https'),
                    'useTLS' => env('REVERB_SCHEME', 'https') === 'https',
                ],
                'allowed_origins' => ['*'],
                'ping_interval' => env('REVERB_APP_PING_INTERVAL', 60),
                'max_message_size' => env('REVERB_APP_MAX_MESSAGE_SIZE', 10_000),
            ],
        ],

    ],

];
