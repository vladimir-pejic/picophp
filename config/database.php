<?php

return [
    'default' => env('DB_CONNECTION') ?: 'mysql',
    'connections' => [
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
            'port'      => env('DB_PORT'),
            'database'  => env('DB_DATABASE'),
            'username'  => env('DB_USERNAME'),
            'password'  => env('DB_PASSWORD'),
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ],
        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DB_HOST'),
            'port'     => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => env('DB_SCHEMA') ?: 'public',
        ],
        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => env('DB_DATABASE'),
            'prefix'   => '',
        ],
    ]
];
