<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 20.08.2017
 * Time: 8:00
 */

use Uzh\Snowpro\Core\Request;

return [
    Request::GET.' /' => ['Default','index'],
    Request::GET.' admin' => ['Admin','index'],
    Request::GET.' 404' => ['Errors','404']
];
