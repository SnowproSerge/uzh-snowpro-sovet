<?php
/**
 * @author Sergey Naryshkin
 * @date: 13.08.17
 */

namespace Uzh\Snowpro\Core;


use PHPUnit\Runner\Exception;
use Uzh\Snowpro\Core\Exception\BaseException;

class Router
{
    /** @var  array $path  Таблица роутинга */
    private $routes;

    public function __construct()
    {
        try {

            $this->routes = include Config\Config::getConf()->router_table;
        } catch (Exception $e) {
            throw new BaseException("Routing table not set :".$e->getMessage());
        }
//        if($this->routes === null)
//            throw new BaseException("Routing table not set!");
    }

    public function route($path, RequestWeb $request)
    {
        
    }

    /**
     * @param $path string
     * @return array
     */
    private function parsePath($path)
    {
        $expl = explode('/',$path);
        $ret =[];
        foreach ($expl as $value) {
            if(!empty($value))
                $ret[] =$value;
        }
        return $ret;
    }
    public function getRoutes() {
        return $this->routes;
    }
}