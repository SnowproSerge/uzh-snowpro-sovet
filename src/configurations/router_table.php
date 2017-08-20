<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 20.08.2017
 * Time: 8:00
 */

$route_array = array(
    '' => '',
    'admin' => 'Admin/index',
);

\Uzh\Snowpro\Core\Config\Config::getConf()->loadConfig(array('ROUTE_TABLE' => $route_array));
