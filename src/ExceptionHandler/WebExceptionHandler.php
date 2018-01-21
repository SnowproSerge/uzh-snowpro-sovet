<?php
/**
 * @author: Sergey Naryshkin
 * @date: 28.12.2017
 */

namespace Uzh\Snowpro\ExceptionHandler;


use Uzh\Snowpro\Core\App;

class WebExceptionHandler implements DefaultExceptionHandler
{
    /**
     * @param \Exception $e
     */
    public function handleException($e): void
    {
        App::logger()->addInfo('Error: '.$e->getMessage(),$e->getTrace());
        echo $e->getMessage(),"\n";
        echo $e->getTraceAsString(),"\n";
    }

}