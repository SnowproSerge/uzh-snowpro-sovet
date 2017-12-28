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
        if(($posPathEnd =strpos($this->uri,'?')) !== false) {
            $this->path = substr($this->uri, '0', $posPathEnd);
        }else {
            $this->path = $this->uri;
        }
        $this->get_params = $_GET;
        $this->post_params = $_POST;
        $this->cookies_params = $_COOKIE;
        if ($this->method === self::GET) {
            $this->params = $this->get_params;
        }
        else {
            $this->params = $this->post_params;
        }
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

    /**
     * @return array
     */
    public function getGetParams(): array
    {
        return $this->get_params;
    }

    /**
     * @return array
     */
    public function getPostParams(): array
    {
        return $this->post_params;
    }

    /**
     * @return array
     */
    public function getCookiesParams(): array
    {
        return $this->cookies_params;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

}