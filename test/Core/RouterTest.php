<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 22.08.2017
 * Time: 21:56
 */

namespace Uzh\Snowpro\Test\Core;


use PHPUnit\Framework\TestCase;
use \Uzh\Snowpro\Core\Router;

class RouterTest extends TestCase
{

    private $router;

    protected function setUp()
    {
        $this->router = new Router();
    }
    protected function tearDown()
    {
        unset($this->router);
    }

    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }

    public function testParsePath()
    {
        $arr = $this->invokeMethod($this->router,'parsePath',['//aaa/bbb/ccc/']);
        $this->assertEquals(implode('_',$arr),implode('_',['aaa','bbb','ccc']));
    }

    public function testGetRoutes()
    {
        $arr = $this->router->getRoutes();
        $this->assertArrayHasKey('GET',$arr);
    }

}
