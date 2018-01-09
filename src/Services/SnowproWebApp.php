<?php
/**
 * @author Sergey Naryshkin
 * Date: 09.01.2018 13:14
 */

namespace Uzh\Snowpro\Services;


use Uzh\Snowpro\Core\App;
use Uzh\Snowpro\Core\RequestWeb;
use Uzh\Snowpro\ExceptionHandler\WebExceptionHandler;

class SnowproWebApp extends App
{

    /**
     * SnowproApp constructor.
     * @param $config
     */
    public function __construct($config)
    {
        parent::__construct($config);
        $this->request = new RequestWeb();   // todo : from Config
        $this->auth = new SnowproAuth();  // todo : from Config
        $this->errorHandler = new WebExceptionHandler();  // todo : from Config
    }
}