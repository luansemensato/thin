<?php

/**
 * Main routes.
 *
 * @author Gustavo Straube <gustavo@creativeduo.com.br>
 * @copyright 2015, Creative Duo.
 */

/**
 * Show a dummy index page.
 *
 * Route: /
 * Name: main.index
 * Method: GET
 */
$app->get('/', function () use ($app) {
    $app->render('main/index.html.twig');
})->name('main.index');
