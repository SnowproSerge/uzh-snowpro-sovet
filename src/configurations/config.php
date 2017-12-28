<?php

use Uzh\Snowpro\Core\RequestWeb;

/**
 * @author Sergey Naryshkin
 * @date: 13.08.17
 */
return [
    'base_dir' => __DIR__. '/../../',
    'router_table' => __DIR__.'/router_table.php',
    'db_config' => __DIR__.'/router_table.php',
    'requests' => [
        'web' => RequestWeb::class
    ]
];