<?php
/**
 * Created by PhpStorm.
 * User: naryshkin
 * Date: 30.08.2018
 * Time: 12:21
 */

namespace Uzh\Snowpro\Core\RestModel;


use Uzh\Snowpro\Core\AbstractModel;

class RestWork
{
    /** @var string */
    private $url;
    /** @var int */
    private $port;

    /**
     * RestWork constructor.
     * @param string $url
     * @param int $port
     */
    public function __construct(string $url, int $port)
    {
        $this->url = $url;
        $this->port = $port;
    }

    public function getModel(AbstractModel $modelDto, string $path, string $method):AbstractModel
    {
    //todo ralise
    }
}