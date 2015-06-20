<?php

namespace Thin\Support;

use Slim\Slim;

/**
 * Response support class.
 *
 * @author Gustavo Straube <gustavo@creativeduo.com.br>
 * @copyright 2015, Creative Duo.
 */
class Response
{

    /**
     * Create a new response with JSON content type.
     *
     * The given <code>$body</code> will be encoded into JSON format, despite 
     * its type.
     *
     * @param mixed $body The content to return with the response.
     * @param int $code The response HTTP code. Defaults to 200.
     * @return \Slim\Http\Response
     */
    public static function json($body, $code = 200)
    {
        $app = Slim::getInstance();
        $app->response->setStatus($code);
        $app->response->headers->set('Content-type', 'application/json; charset=utf-8');
        $app->response->setBody(json_encode($body));
        return $app->response;
    }
}
