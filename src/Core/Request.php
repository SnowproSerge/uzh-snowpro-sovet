<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 22.08.2017
 * Time: 22:56
 */

namespace Uzh\Snowpro\Core;

/**
 * Interface Request
 * @package Uzh\Snowpro\Core
 */
interface Request
{

    public const POST = 'POST';
    public const GET = 'GET';
    public const PUT = 'PUT';
    public const DELETE = 'DELETE';
    public const ALL      = '*';

    public function getPath();

    public function getParams();

    public function getMethod();

}