<?php

use Uzh\Snowpro\Core\RequestWeb;

/**
 * @author Sergey Naryshkin
 * @date: 13.08.17
 */
return [
    'base_dir' => __DIR__. '/../../',
    'router_table' => include __DIR__.'/router_table.php',
    'requests' => [
        'web' => RequestWeb::class
    ],
    'logger' => [
        'handler' => 'ChromePHPHandler',
        'path' => __DIR__. '/../../logs/main.log',
        'level' => \Monolog\Logger::DEBUG
    ]
];