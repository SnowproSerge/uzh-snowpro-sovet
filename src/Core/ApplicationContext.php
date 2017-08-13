<?php
/**
 * @author Sergey Naryshkin
 * @date: 13.08.17
 */

namespace Uzh\Snowpro\Core;

/**
 * Класс контейнера приложения
 *
 * Class ApplicationContext
 * @package Uzh\Snowpro\Core
 */
class ApplicationContext
{
    /** @var $instance ApplicationContext */
    protected static $instance;

    /** @var  $request Request */
    protected $request;

    /** Инициализация приложения */
    public static function init() {
        self::$instance = new ApplicationContext();
    }

    protected function __construct()
    {
        $this->request = new Request();

    }

    public static function getInstance() {
        return self::$instance;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }


}