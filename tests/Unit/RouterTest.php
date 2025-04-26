<?php

declare(strict_types=1);

use App\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp();

        $this->router = new Router();
    }


    public  function test_it_registers_a_route(): void
    {
        $this->router->register('get', '/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index']
            ]
        ];

        $this->assertEquals($expected, $this->router->routes());
    }   

    public function test_register_get_route(): void 
    {
        $this->router->get('/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index']
            ]
        ];

        $this->assertEquals($expected, $this->router->routes());
    }

    public function test_register_post_route(): void 
    {
        $this->router->post('/users', ['Users', 'store']);

        $expected = [
            'post' => [
                '/users' => ['Users', 'store']
            ]
        ];

        $this->assertEquals($expected, $this->router->routes());
    }

    public function test_no_routes_at_start(): void
    {
        $router = new Router();
        
        $this->assertEmpty($router->routes());
    }

    /**
     * @dataProvider routeNotFoundCases
     */

    public function test_show_no_exception(
        string $requestUri, 
        string $requestMethod
    ): void
    {
        $users = new class() {
            public function delete()
            {
                return true;
            }
        };

        $this->router->post('/users', [$users::class, 'store']);
        $this->router->get('/users', ['Users', 'index']);

        $this->expectException(RouteNotFoundException::class);

        $this->router->resolve($requestUri, $requestMethod);
    }

    public function routeNotFoundCases(): array
    {
        return [
            ['/users', 'put'],
            ['/invoices', 'post'],
            ['/users', 'get'],
            ['/users', 'post']
        ];
    }

    public function test_resolves_route_from_closure(): void
    {
        $this->router->get('/users', fn() => [1, 2, 3]);

        $this->assertEquals(
            [1,2,3],
            $this->router->resolve('/users', 'get')
        );
    }

    public function test_resolves_route(): void
    {
        $users = new class() {
            public function index(): array
            {
                return [1, 2, 3];
            }
        };

        $this->router->get('/users', [$users::class, 'index']);
        $this->assertSame([1, 2, 3], $this->router->resolve('/users', 'get'));
    }
}