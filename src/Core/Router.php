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
     */
    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    /**
     * Поиск маршрута и параметров
     *
     * @param $path
     * @param $method
     * @return array
     * @throws RoutingException
     */
    public function route($path, $method): array
    {
        try {
            $routes = $this->routes[$method];
            $path_array = $this->parsePath($path);
            foreach ($routes as $template=>$route) {
                if(($param_array = $this->checkRoute($path_array,$template)) !== null) {
                    return [$route[0],$route[1],$param_array];
                }
            }
            $routes = $this->routes[Request::ALL];
            foreach ($routes as $template => $route) {
                if (($param_array = $this->checkRoute($path_array, $template)) !== null) {
                    return array($route[0], $route[1], $param_array);
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
    private function checkRoute(array $path, string $rout): ?array
    {
        $test_arr = $this->parsePath($rout);
        $ret_array = [];
        $iMax = \count($test_arr);
        if($iMax != \count($path)) {
            return null;
        }

        for ($i= 0;  $i< $iMax; $i++) {
            if(preg_match('/^<([a-zA-Z]\w*):(.+)>$/',$test_arr[$i],$matches)) {
                if(!preg_match('/'.$matches[2].'/',$path[$i],$value)) {
                    return null;
                }
                $ret_array[$matches[1]] = $value[0];
            } elseif ($test_arr[$i] !== $path[$i]) {
                return null;
            }
        }
        return $ret_array;
    }
    /**
     * @param $path string
     * @return array
     */
    private function parsePath(string $path): array
    {
        $expl = explode('/', $path);
        $ret = [];
        foreach ($expl as $value) {
            if (!empty($value)) {
                $ret[] = $value;
            }
        }
        return $ret;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}