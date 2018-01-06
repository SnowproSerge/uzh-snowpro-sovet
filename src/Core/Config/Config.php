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

//use \Uzh\Snowpro\Core\Db\DbConnection;
use \Uzh\Snowpro\Core\Exception\BaseException;

/**
 * Class Config
 * @package Uzh\Snowpro\Core\Config
 * @property string base_dir
 * @property array router_table
 * @property array main_menu
 *
 */
class Config
{
    /**
     * Массив настроечных параметров
     * @var array
     */
    private $properties;


    /**
     * Config constructor.
     * @param string $fileConfig
     * @throws \Exception
     */
    public function __construct($fileConfig)
    {
        if(!file_exists($fileConfig)) {
            throw new BaseException('Not exist file '.$fileConfig);
        }
        $config = include ($fileConfig);
        $this->loadConfig($config);
    }

    /**
     * Загрузка переменных конфигурации через массив
     * @param array $arr
     */
    public function loadConfig(array $arr): void
    {
        if(\is_array($this->properties) && \count($this->properties)) {
            $this->properties = array_merge($this->properties, $arr);
        } else {
            $this->properties = $arr;
        }
    }

    /**
     * Магический метод для доступа на чтение к параметру как к свойству объекта
     *
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {

        if(isset($this->properties[$name])) {
            return $this->properties[$name];
        }
        return null;
    }

    /**
     * Магический метод для доступа на запись к параметру как к свойству объекта
     *
     * @param $name
     * @param $value
     * @return mixed|null
     * @throws BaseException
     */
    public function __set($name,$value)
    {
        throw new BaseException("You can't set config parameters!");
    }

    public function __isset($name)
    {
        return isset($this->properties[$name]);
    }
}