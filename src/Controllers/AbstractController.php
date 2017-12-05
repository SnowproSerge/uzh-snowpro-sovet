<?php
/**
 * @author Sergey Naryshkin
 * @date: 12.08.17
 */

namespace Uzh\Snowpro\Controllers;



use Uzh\Snowpro\Core\Request;

/**
 * Class AbstractController
 *
 * todo реализовать логику вызова экшина
 * @package Uzh\Snowpro\Controllers
 */
abstract class AbstractController
{
    /**
     * @var Request
     */
    protected $request;

    public function actionProcess($action,$path_params) {

    }
}