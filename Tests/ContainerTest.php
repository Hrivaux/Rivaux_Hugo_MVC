<?php

use PHPUnit\Framework\TestCase;
use App\DependencyInjection\Container;
use Psr\Container\ContainerInterface;
use App\DependencyInjection\ServiceNotFoundException;

class ContainerTest extends TestCase
{
    public function testContainerCanBeInstantiated()
    {
        $container = new Container();
        $this->assertInstanceOf(ContainerInterface::class, $container);
    }

    public function testSetAndGetService()
    {
        $container = new Container();
        $service = new \stdClass();

        $container->set('myService', $service);
        $this->assertTrue($container->has('myService'));
        $this->assertEquals($service, $container->get('myService'));
    }


    public function testGetServiceThrowsExceptionIfNotFound()
    {
        $container = new Container();

        $this->expectException(ServiceNotFoundException::class);
        $container->get('nonExistingService');
    }
}
