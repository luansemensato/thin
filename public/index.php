<?php

/**
 * Application front controller.
 *
 * Run the application.
 *
 * @author Gustavo Straube <gustavo@creativeduo.com.br>
 * @copyright 2015, Creative Duo.
 */

/*
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

require 'vendor/autoload.php';

/*
 * Starting session.
 */
session_cache_limiter(false);
session_start();

$app = new \Slim\Slim();

require 'app/bootstrap.php';

$app->run();
