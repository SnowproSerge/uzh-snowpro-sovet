<?php
/**
 * @author Sergey Naryshkin
 * @date: 12.08.17
 */

namespace Uzh\Snowpro\Controllers;


use Uzh\Snowpro\Services\Request;

abstract class AbstractController
{
    /**
     * @var Request
     */
    protected $request;

    public function actionProcess() {

    }
}