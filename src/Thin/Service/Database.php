<?php

namespace Thin\Service;

use Illuminate\Database\Capsule\Manager;

use Slim\Slim;

/**
 * Database service.
 *
 * Setup and integrate Laravel's ORM with the application.
 *
 * More info: http://laravel.com/docs/5.1/database
 *
 * Required configuration:
 *   - db.driver
 *   - db.host
 *   - db.database
 *   - db.username
 *   - db.password
 *   - db.charset
 *   - db.collation
 *   - db.prefix
 *
 * @author Gustavo Straube <gustavo@creativeduo.com.br>
 * @copyright 2015, Creative Duo.
 */
class Database implements ServiceInterface
{

    /**
     * Setup the database service.
     *
     * @param \Slim\Slim $app The application instance.
     */
    public static function setup(Slim $app)
    {
        $manager = new Manager();
        $manager->addConnection([
            'driver'    => $app->config('db.driver'),
            'host'      => $app->config('db.host'),
            'database'  => $app->config('db.database'),
            'username'  => $app->config('db.username'),
            'password'  => $app->config('db.password'),
            'charset'   => $app->config('db.charset'),
            'collation' => $app->config('db.collation'),
            'prefix'    => $app->config('db.prefix'),
        ]);
        $manager->setAsGlobal();
        $manager->bootEloquent();
        $app->database = $manager;
    }
}
