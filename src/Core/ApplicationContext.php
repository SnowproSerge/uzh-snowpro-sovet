<?php
/**
 * @author Sergey Naryshkin
 * @date: 13.08.17
 */

namespace Uzh\Snowpro\Core;

use Uzh\Snowpro\Core\Config\Config;

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

    /** @var  $request RequestWeb */
    protected $request;
    /** @var  $request Config */
    protected $config;

    /** Инициализация приложения */
    public static function init() {
        self::$instance = new ApplicationContext();
    }

    protected function __construct()
    {
        $this->request = new RequestWeb();

    }

    public static function getInstance() {
        return self::$instance;
    }

    /**
     * @return RequestWeb
     */
    public static function getRequest()
    {
        return self::getInstance()->request;
    }


}