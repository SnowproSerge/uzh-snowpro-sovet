<?php
/**
 * Date: 20.08.2017
 * Time: 8:00
 */

use Uzh\Snowpro\Core\Request;

return [
    Request::GET => [
        '/' => ['Main', 'index'],
        '/admin' => ['Admin', 'index'],
        '/404' => ['Errors', '404'],
        '/test/<param1:\d+>/<param2:[a-z]{2}\d{2}-53>/infoget' => ['Default', 'testGet']     //for test
    ],
    Request::POST => [
        '/test/<param1:\d+>/<param2:[a-z]{2}\d{2}-53>/infopost' => ['Default', 'testPost']     //for test
    ]
];
