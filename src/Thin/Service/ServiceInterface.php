<?php

namespace Thin\Service;

use Slim\Slim;

/**
 * Service interface.
 *
 * This interface should be used as base for service setup classes.
 *
 * @author Gustavo Straube <gustavo@creativeduo.com.br>
 * @copyright 2015, Creative Duo.
 */
interface ServiceInterface
{

    /**
     * Setup the service.
     *
     * @param \Slim\Slim $app The application instance.
     */
    public static function setup(Slim $app);

}
