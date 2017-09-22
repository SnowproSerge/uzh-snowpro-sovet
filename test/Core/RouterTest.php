<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 22.08.2017
 * Time: 21:56
 */

namespace Uzh\Snowpro\Test\Core;


use PHPUnit\Framework\TestCase;
use Uzh\Snowpro\Core\Request;
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

    public function providerParsePath()
    {
        return [
            'first' => ['//aaa/bbb/ccc/', ['aaa', 'bbb', 'ccc']],
            'second' => ['aaa/bbb/ccc', ['aaa', 'bbb', 'ccc']],
            'empty' => ['/', []]
        ];
    }

    public function providerCheckRoute()
    {
        return [
            'empty' => ['',[], []],
            'bad' => ['test3/test2/test1',['test1','test2','test3'], null],
            'greater' => ['test/test/test',['test','test'], null],
            'less' => ['test/test/test',['test','test','test','test'], null],
            'simlpe' => ['/admin',['admin'], []],
            'test' => ['/test/<param1:\d+>/<param2:\w{2}\d{2}-53>/info',['test','1234','ab22-53','info'], ['param1' => '1234', 'param2' => 'ab22-53']],
            'test1' => ['/test/<pAram:\d+>/<param2:\w{2}\d{2}-53>/info',['test','1234','ab22-53','info'], ['pAram' => '1234', 'param2' => 'ab22-53']],
            'wrong name of variable' => ['/test/<param1:\d+>/<param2:\w{2}\d{2}-53>/info',['test','1234','ab22-53','info'], ['param1' => '1234', 'param2' => 'ab22-53']],
            'not match regexp' => ['/test/<param1:\d+>/<param2:\[a-zA-Z]{2}\d{2}-53>/info',['test','1234','ab222-53','info'], null]
        ];
    }

    public function providerTestRoute()
    {
        return [
           "simple get" => [Request::GET,'/',['Default','index',[]]],
           "get with parameter" =>[Request::GET,'/test/1234/ab22-53>/infoget',['Default', 'testGet',['param1' => '1234', 'param2' => 'ab22-53']]],     //for test
           "post with parameter" =>[Request::POST,'/test/1234/ab22-53>/infopost',['Default', 'testPost',['param1' => '1234', 'param2' => 'ab22-53']]]     //for test
       ];
    }

    /**
     * @dataProvider providerParsePath
     */
    public function testParsePath(string $path, array $result)
    {
        $arr = $this->invokeMethod($this->router, 'parsePath', [$path]);
        $this->assertEquals($arr, $result);
    }

    /**
     * @dataProvider providerCheckRoute
     */
    public function testCheckRoute(string $route, array $path, $result)
    {
        $arr = $this->invokeMethod($this->router, 'checkRoute', [$path,$route]);
        $this->assertEquals($arr, $result);
    }

    public function testGetRoutes()
    {
        $arr = $this->router->getRoutes();
        $this->assertArrayHasKey('GET', $arr);
    }

    /**
     * @dataProvider providerTestRoute
     *
     * @param string $method
     * @param string $path
     * @param array $result
     */
    public function testRoute(string $method,string $path,array $result)
    {
        self::assertEquals($this->router->route($path,$method),$result);
    }
}
