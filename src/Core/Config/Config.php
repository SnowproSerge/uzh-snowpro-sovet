<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 24.08.16
 * Time: 11:46
 */

namespace Uzh\Snowpro\Core\Config;


/**
 * Класс конфигурации.
 * Реализован как синглтон и содержит параметры конфигурации и ссылку на коннектор с CRM
 *
 *
 * Class Config
 * @package Uzh\Snowpro\Config
 */

use \Uzh\Snowpro\Core\Db\DbConnection;

class Config
{
    /**
     * Экземпляр объекта конфигурации - для организации синглтона
     * @var \Uzh\Snowpro\Core\Config\Config
     */
    private static $instance;
    /**
     * Массив настроечных параметров
     * @var array
     */
    private $properties;
    /**
     * @var \Uzh\Snowpro\Core\Db\DbConnection
     */
    private $Db;

    /**
     * @return \Uzh\Snowpro\Core\Db\DbConnection
     */
    public function getDb()
    {
        if(!self::$instance->Db) $this->setDb(new DbConnection());
        return self::$instance->Db;
    }

    /**
     * @param \Uzh\Snowpro\Core\Db\DbConnection $Db
     */
    public function setDb($Db)
    {
        self::$instance->Db = $Db;
    }

    /**
     * Реализация синглтона
     * Config constructor.
     */
    private function __construct()
    {
    }

    /**
     * Получение общего объекта конфигурации
     * @return static
     */
    public static function getConf()
    {
        if (!self::$instance) self::$instance = new static();
        return self::$instance;
    }

    /**
     * Загрузка переменных конфигурации через массив
     * @param array $arr
     */
    public function loadConfig(array $arr) {
        if(is_array($this->properties) and count($this->properties)) $this->properties= array_merge($this->properties,$arr);
        else $this->properties = $arr;
    }

    /**
     * Магический метод для доступа на чтение к параметру как к свойству объекта
     *
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        if(isset($this->properties[$name])) return $this->properties[$name];
        else return null;
    }
}