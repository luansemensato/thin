<?php

namespace Thin\Service;

use Illuminate\Pagination\Paginator;

use Slim\Slim;

/**
 * Pagination service.
 *
 * Setup and integrate Laravel's Pagination with the application.
 *
 * More info: http://laravel.com/docs/5.1/pagination
 *
 * Optional configuration:
 *   - pagination.key
 *
 * @author Gustavo Straube <gustavo@creativeduo.com.br>
 * @copyright 2015, Creative Duo.
 */
class Pagination implements ServiceInterface
{

    /**
     * Setup the pagination service.
     *
     * @param \Slim\Slim $app The application instance.
     */
    public static function setup(Slim $app)
    {
        $key = $app->config('pagination.key');
        if (empty($key)) {
            $key = 'page';
        }
        Paginator::currentPageResolver(function () use ($app, $key) {
            return $app->request->get($key);
        });
    }
}
