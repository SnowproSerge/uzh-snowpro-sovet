<?php
/**
 * @author Sergey Naryshkin
 * @date: 13.08.17
 */

namespace Uzh\Snowpro\Core;

/**
 * Класс обработки и хранения параметров запроса.
 *
 * Class Request
 * @package Uzh\Snowpro\Core
 */
class Request
{
    /** @var  $path string путь вызова */
    private $path;

    /** @var $get_params array параметры get */
    private $get_params;

    /** @var $post_params array параметры post */
    private $post_params;

    /** @var $cookies_params array параметры cookies */
    private $cookies_params;

    /** @var $params array все параметры  */
    private $params;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->path = $_SERVER['REQUEST_URI'];
        $this->get_params = $_GET;
        $this->post_params = $_POST;
        $this->cookies_params = $_COOKIE;
        $this->params = array_merge($this->post_params,$this->get_params,$this->cookies_params);
    }


    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return array
     */
    public function getGetParams()
    {
        return $this->get_params;
    }

    /**
     * @return array
     */
    public function getPostParams()
    {
        return $this->post_params;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }



}