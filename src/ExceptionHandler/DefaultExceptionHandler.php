<?php
/**
 * @author: Sergey Naryshkin
 * @date: 28.12.2017
 */

namespace Uzh\Snowpro\ExceptionHandler;


interface DefaultExceptionHandler
{
    /**
     * @param \Exception $e
     */
    public function handleException($e);
}