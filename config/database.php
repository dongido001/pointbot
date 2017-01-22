<?php

return [

    // -------------------------------------------------
    // Database driver. Supported: mysql.
    // -------------------------------------------------

    'driver' => 'pgsql',

    // -------------------------------------------------
    // Should the database component use eloquent?
    // -------------------------------------------------

    'eloquent' => true,

    // -------------------------------------------------
    // Database driver details
    // -------------------------------------------------

    'mysql' => [
        'host'      => 'localhost',
        'database'  => 'pointbot',
        'username'  => 'root',
        'password'  => '',
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
    ],

    'pgsql' => [
           'driver'   => 'pgsql',
           'host'     => 'ec2-54-225-67-3.compute-1.amazonaws.com:5432',
           'database' => 'dfib33mv04c9jv',
           'username' => 'hxirqjcpcwriwt',
           'password' => 'a703aacb06b33e68fd08497cd99b3fed912c014475a83c2c8a35dc20b32803ed',
           'charset'  => 'utf8',
           'prefix'   => '',
           'schema'   => 'public',
      ],
];