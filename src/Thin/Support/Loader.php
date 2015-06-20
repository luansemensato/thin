<?php

namespace Thin\Support;

use DirectoryIterator;

/**
 * Loader support class.
 *
 * @author Gustavo Straube <gustavo@creativeduo.com.br>
 * @copyright 2015, Creative Duo.
 */
class Loader
{

    /**
     * Load configuration file for each application mode.
     *
     * @param string $dir The configuration files directory.
     */
    public static function loadConfigModes($app, $dir = 'app/config/')
    {
        $dir = rtrim($dir, '/') . '/';
        foreach (new DirectoryIterator($dir) as $file) {
            $parts = explode('.', $file->getBasename(), 2);
            if (count($parts) === 2 && $parts[1] === 'php') {
                $mode = $parts[0];
                $path = $dir . $file->getFilename();
                $app->configureMode($mode, function () use ($app, $path) {
                    $app->config(require $path);
                });
            }
        }
    }

    /**
     * Load routes.
     *
     * @param string $dir The routes directory.
     */
    public static function loadRoutes($app, $dir = 'app/routes/')
    {
        $dir = rtrim($dir, '/') . '/';
        foreach (new DirectoryIterator($dir) as $file) {
            if (substr($file->getBasename(), -4) === '.php') {
                require $dir . $file->getFilename();
            }
        }
    }
}
