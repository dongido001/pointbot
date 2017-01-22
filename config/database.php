<?php

return [

    // -------------------------------------------------
    // Database driver. Supported: mysql.
    // -------------------------------------------------

    'driver' => 'mysql',

    // -------------------------------------------------
    // Should the database component use eloquent?
    // -------------------------------------------------

    'eloquent' => true,

    // -------------------------------------------------
    // Database driver details
    // -------------------------------------------------

    'mysql' => [
        'host'      => 'sql8.freesqldatabase.com',
        'database'  => 'sql8155055',
        'username'  => 'sql8155055',
        'password'  => '9C85JKYVR7',  
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],

    'redis' => [
        'cluster' => false,
        'default' => [
            'host' => '127.0.0.1',
            'port' => 6379,
            'database' => 0,
        ],
    ]

];