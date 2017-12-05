<?php
/**
 * @author Sergey Naryshkin
 * @date: 13.08.17
 */

namespace Uzh\Snowpro\Core;

/**
 * Класс обработки и хранения параметров запроса.
 *
 *
 * Class RequestWeb
 * @package Uzh\Snowpro\Core
 */
class RequestWeb implements Request
{


    /** @var  $path string путь вызова */
    private $path;

    /** @var $get_params array параметры get */
    private $get_params;

    /** @var $post_params array параметры post */
    private $post_params;

    /** @var $cookies_params array параметры cookies */
    private $cookies_params;

    /** @var $params array все параметры */
    private $params;

    /** @var  string $uri Путь без параметров */
    private $uri;

    /** @var  string $method ьетод запроса */
    private $method;

    /**
     * RequestWeb constructor.
     */
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->path = stristr($this->uri, '?', true);
        $this->get_params = $_GET;
        $this->post_params = $_POST;
        $this->cookies_params = $_COOKIE;
        if ($this->method === self::GET)
            $this->params = $this->get_params;
        else
            $this->params = $this->post_params;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    public function getRouteString()
    {
        return $this->method . ' ' . $this->path;
    }
}