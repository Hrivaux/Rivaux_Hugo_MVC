<?php

use PHPUnit\Framework\TestCase;
use App\Routing\Router;
use App\Routing\Route;
use App\Routing\Exception\RouteNotFoundException;
use Psr\Container\ContainerInterface;

class RouterTest extends TestCase
{
    public function testRouterCanBeInstantiated()
    {

        $containerMock = $this->createMock(ContainerInterface::class);


        $router = new Router($containerMock);
        $this->assertInstanceOf(Router::class, $router);
    }

    public function testAddRoute()
    {
        $containerMock = $this->createMock(ContainerInterface::class);
        $router = new Router($containerMock);

        $route = new Route('/test', 'test', 'GET', 'App\Controller\TestController', 'testMethod');
        $router->addRoute($route);

        $routes = $router->getRoutes();
        $this->assertCount(1, $routes);
        $this->assertSame($route, $routes[0]);
    }

    public function testGetRoute()
    {
        $containerMock = $this->createMock(ContainerInterface::class);
        $router = new Router($containerMock);

        $route1 = new Route('/test', 'test1', 'GET', 'App\Controller\TestController', 'testMethod');
        $route2 = new Route('/another', 'test2', 'POST', 'App\Controller\AnotherController', 'anotherMethod');

        $router->addRoute($route1);
        $router->addRoute($route2);

        $retrievedRoute = $router->getRoute('/another', 'POST');
        $this->assertSame($route2, $retrievedRoute);
    }

    public function testExecuteRoute()
    {
        $containerMock = $this->createMock(ContainerInterface::class);
        $router = new Router($containerMock);

        $route = new Route('/test', 'test', 'GET', 'App\Controller\TestController', 'testMethod');
        $router->addRoute($route);


        $result = $router->execute('/test', 'GET');
        $this->assertNotNull($result);

    }


}
