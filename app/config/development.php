<?php

return [

    // Core
    'debug' => true,
    'timezone' => 'America/New_York',
    'log.enable' => true,
    'log.level' => \Slim\Log::DEBUG,

    // Cookies
    'cookies.encrypt' => true,
    'cookies.secret_key' => 'CHANGE_THIS_TO_A_SECRET_VALUE',
    'cookies.cipher' => MCRYPT_RIJNDAEL_256,
    'cookies.cipher_mode' => MCRYPT_MODE_CBC,

    // Database
    'db.driver' => 'mysql',
    'db.host' => '127.0.0.1',
    'db.database' => '',
    'db.username' => 'root',
    'db.password' => '',
    'db.charset' => 'utf8mb4',
    'db.collation' => 'utf8mb4_general_ci',
    'db.prefix' => '',

    // Template
    'view.path' => 'app/views',
    'view.cache_path' => 'data/cache/views',
    'view.extensions' => [],

];
