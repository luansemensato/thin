<?php

namespace Thin\Service;

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Twig_Extension_Debug;

/**
 * Template service.
 *
 * Setup and integrate Twig Template Engine with the application.
 *
 * More info: http://twig.sensiolabs.org
 *
 * Required configuration:
 *   - view.path
 *   - view.cache_path
 *
 * Optional configuration:
 *   - vuew.extesions
 *
 * @author Gustavo Straube <gustavo@creativeduo.com.br>
 * @copyright 2015, Creative Duo.
 */
class Template implements ServiceInterface
{

    /**
     * Setup the template service.
     *
     * @param \Slim\Slim $app The application instance.
     */
    public static function setup(Slim $app)
    {
        $debug = $app->config('debug');
        $view = $app->view(new Twig());
        $view->parserOptions = [
            'debug' => $debug,
            'cache' => $app->config('view.cache_path'),
        ];
        $view->setTemplatesDirectory($app->config('view.path'));
        $view->parserExtensions = [
            new TwigExtension(),
        ];
        if ($debug) {
            $view->parserExtensions[] = new Twig_Extension_Debug();
        }
        $extensions = (array) $app->config('view.extensions');
        foreach ($extensions as $ext) {
            $view->parserExtensions[] = new $ext();
        }
    }
}
