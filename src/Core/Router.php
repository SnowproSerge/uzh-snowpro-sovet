<?php
/**
 * @author Sergey Naryshkin
 * @date: 13.08.17
 */

namespace Uzh\Snowpro\Core;


use Uzh\Snowpro\Core\Exception\RoutingException;

/**
 * Class Router
 * Определяет Контроллер и действие по маршруту
 * используется заданная в конфигурации таблица роутинго
 *
 * @package Uzh\Snowpro\Core
 */
class Router
{
    /** @var  array $path Таблица роутинга */
    private $routes;

    /**
     * Router constructor.
     * @throws RoutingException
     */
    public function __construct()
    {
        try {
            $this->routes = include Config\Config::getConf()->router_table;
        } catch (\Exception $e) {
            throw new RoutingException("Routing table not set :" . $e->getMessage());
        }
    }

    /**
     * Фабричный метод
     *
     * @return Router
     */
    public static function init()
    {
        return  new Router();
    }

    /**
     * Поиск маршрута и параметров
     *
     * @param $path
     * @param $method
     * @return array
     * @throws RoutingException
     */
    public function route($path, $method)
    {
        try {
            $routes = $this->routes[$method];
            $path_array = $this->parsePath($path);
            foreach ($routes as $template=>$route) {
                if(($param_array = $this->checkRoute($path_array,$template)) !== null) {
                    return [$route[0],$route[1],$param_array];
                }
            }
        } catch (\Exception $e) {
            throw new RoutingException("Bad path or request method :" . $e->getMessage());
        }
        throw new RoutingException("Route for path '$path' not found!");
    }

    /**
     *
     *
     * @param array $path
     * @param string $rout
     * @return array|null
     */
    private function checkRoute(array $path, string $rout) {
        $test_arr = $this->parsePath($rout);
        $ret_array = [];
        if(count($test_arr) != count($path))
            return null;

        for ($i= 0; $i< count($test_arr);$i++) {
            if(preg_match('/^<([a-zA-Z]\w*):(.+)>$/',$test_arr[$i],$matches)) {
                if(!preg_match('/'.$matches[2].'/',$path[$i],$value))
                    return null;
                $ret_array[$matches[1]] = $value[0];
            } elseif ($test_arr[$i] !== $path[$i])
                return null;
        }
        return $ret_array;
    }
    /**
     * @param $path string
     * @return array
     */
    private function parsePath(string $path)
    {
        $expl = explode('/', $path);
        $ret = [];
        foreach ($expl as $value) {
            if (!empty($value))
                $ret[] = $value;
        }
        return $ret;
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}