<?php

namespace Thin\Service;

use Slim\Slim;

/**
 * Form service.
 *
 * This service is used to share a form (or any array of data) between 
 * requests, using the session.
 *
 * Optional configuration:
 *   - form.prefix
 *
 * @author Gustavo Straube <gustavo@creativeduo.com.br>
 * @copyright 2015, Creative Duo.
 */
class Form implements ServiceInterface
{

    /**
     * The internal prefix used when storing/retrieving data from session.
     *
     * @var string The prefix.
     */
    private $prefix = 'form.';

    /**
     * Current request forms.
     *
     * @var array The forms.
     */
    private $forms = [];

    /**
     * Setup the form service.
     *
     * @param \Slim\Slim $app The application instance.
     */
    public static function setup(Slim $app)
    {
        $app->container->singleton('form', function () use ($app) {
            $prefix = $app->config('form.prefix');
            return new Form($prefix ?: null);
        });
    }

    /**
     * Creates a new form service.
     *
     * @param string $prefix The (optional) prefix to be used with this 
     *                       instance.
     */
    public function __construct($prefix = null)
    {
        if (null !== $prefix) {
            $this->prefix = rtrim($prefix, '.') . '.';
        }
        foreach ($_SESSION as $key => $data) {
            if (strpos($key, $this->prefix) === 0) {
                $this->forms[$key] = $data;
                unset($_SESSION[$key]);
            }
        }
    }

    /**
     * Set an array of data (form) using a specific key.
     *
     * @param string $key The key.
     * @param array $data The form.
     */
    public function set($key, array $data)
    {
        if (strpos($key, $this->prefix) !== 0) {
            $key = $this->prefix . $key;
        }
        $this->forms[$key] = $data;
        $_SESSION[$key] = $data;
    }

    /**
     * Get an array of data (form) from a specific key.
     *
     * @param string $key The key.
     * @return array The form.
     */
    public function get($key)
    {
        if (strpos($key, $this->prefix) !== 0) {
            $key = $this->prefix . $key;
        }
        if (isset($this->forms[$key])) {
            return $this->forms[$key];
        }
        return [];
    }

    /**
     * Keep the forms available to the next request.
     *
     * If an array of keys is given, only the specified keys will be kept.
     *
     * @param array $keys The keys to filter.
     */
    public function keep(array $keys = null)
    {
        foreach ($this->forms as $key => $data) {
            if (null === $keys || in_array($key, $keys)) {
                $_SESSION[$key] = $data;
            }
        }
    }
}
