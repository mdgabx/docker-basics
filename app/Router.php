<?php

declare(strict_types=1);

namespace  App;

use App\RouteNotFoundException;
use ReflectionClass;
use App\Attributes\Route;
use Illuminate\Container\Container;

class Router
{
    private array $routes = [];

    public function __construct(private Container $container)
    {
        $this->container = $container;
    }

    public function registerRoutesFromControllerAttributes(array $controllers)
    {
        foreach($controllers as  $controller) {
            $reflectionController = new ReflectionClass($controller);
            
            foreach($reflectionController->getMethods() as $method) {
                $attributes = $method->getAttributes(Route::class);

                foreach($attributes as $attribute) {
                    $route = $attribute->newInstance();

                    $this->register(
                        $route->method, 
                        $route->routePath, 
                        [
                            $controller, $method->getName()
                        ]
                    );
                }
            }
        }
    }

    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestMethod][$route] = $action;

        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }

    public function routes(): array
    {
        return $this->routes;
    }


    public function resolve(string $requestUri, string $requestMethod)
    {
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;

        if (! $action) {
            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }
        
        [$class, $method] = $action;
        
        // Instantiate the class properly
        if (class_exists($class)) {
            $class = $this->container->get($class); // Dependency injection via Container
        
            if (method_exists($class, $method)) {
                return call_user_func_array([$class, $method], []);
            }
        }
        

        throw new RouteNotFoundException();
    }
}
