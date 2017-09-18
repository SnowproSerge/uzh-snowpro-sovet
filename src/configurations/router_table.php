<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 20.08.2017
 * Time: 8:00
 */

use Uzh\Snowpro\Core\Request;

return [
    Request::GET => [
        '/' => ['Default', 'index'],
        '/admin' => ['Admin', 'index'],
        '/404' => ['Errors', '404'],
        '/test/<param1:\d+>/<param2:\w{2}\d{2}-53>/info' => ['Default', 'test']
    ],
    Request::POST => [

    ]
];
