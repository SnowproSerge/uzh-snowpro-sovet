<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 18.09.2017
 * Time: 23:42
 */

namespace Uzh\Snowpro\Core\Config;

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testGetConf()
    {
        $conf = Config::getConf();
        $this->assertInstanceOf('\Uzh\Snowpro\Core\Config\Config', $conf);
    }

    public function testSetRequest()
    {
        Config::getConf()->setRequest('web');
        $this->assertInstanceOf('\Uzh\Snowpro\Core\RequestWeb', Config::getConf()->getRequest());
    }

    /**
     * @expectedException \Uzh\Snowpro\Core\Exception\BaseException
     */
    public function testSetRequestException()
    {
        Config::getConf()->setRequest('web1');
    }
}
