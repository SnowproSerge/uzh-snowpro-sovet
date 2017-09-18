<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 20.08.2017
 * Time: 22:20
 */

namespace Uzh\Snowpro\Test\Core;


use PHPUnit\Framework\TestCase;
use Uzh\Snowpro\Core\RequestWeb;

class RequestWebTest extends TestCase
{
    /**
     * @var RequestWeb
     */
    private $request;

    protected function setUp()
    {
//        $this->request = new RequestWeb();

        $this->request = $this->getMockBuilder('RequestWeb')
            ->setMethods(['getRequestMethod','getRequestUri','init'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->request->expects($this->once())
            ->method('getRequestMethod')
            ->willReturn('POST');

//        $this->request->expects($this->once())
//            ->method('getRequestUri')
//            ->willReturn('/asd/asdasd.html?sdfsd=234');

//        $this->request->init();
    }

    protected function tearDown()
    {
        unset($this->request);
    }

    public function testGetMethod()
    {
        //$method = $this->request->getMethod();
        $method = $this->request->getRequestMethod();
        $this->assertEquals($method,RequestWeb::POST);
    }

}