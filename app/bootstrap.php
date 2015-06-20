<?php

/**
 * Application bootstrap.
 *
 * Load configurations and setup some dependencies.
 *
 * @author Gustavo Straube <gustavo@creativeduo.com.br>
 * @copyright 2015, Creative Duo.
 */

/*
 * Configuration for each application mode.
 */
\Thin\Support\Loader::loadConfigModes($app);

/*
 * Setting the default time zone.
 */
date_default_timezone_set($app->config('timezone'));

/*
 * Setting up services.
 */
\Thin\Service\Database::setup($app);
\Thin\Service\Form::setup($app);
\Thin\Service\Template::setup($app);
\Thin\Service\Pagination::setup($app);

/*
 * Loading routes.
 */
\Thin\Support\Loader::loadRoutes($app);
