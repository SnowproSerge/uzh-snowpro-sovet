<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 22.08.2017
 * Time: 22:56
 */

namespace Uzh\Snowpro\Core;


interface Request
{

    const POST = 'POST';
    const GET = 'GET';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    public function getPath();

    public function getParams();

    public function getMethod();

}