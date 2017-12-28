<?php
/**
 * @author: Sergey Naryshkin
 * @date: 28.12.2017
 */

namespace Uzh\Snowpro\ExceptionHandler;


class WebExceptionHandler implements DefaultExceptionHandler
{
    /**
     * @param \Exception $e
     */
    public function handleException($e): void
    {
        echo $e->getMessage(),"\n";
        echo $e->getTraceAsString(),"\n";
    }
}