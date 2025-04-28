<?php

namespace App;

use Psr\Container\ContainerInterface;
use App\Exception\NotFoundException;
use ReflectionClass;
use App\Exception\ContainerException;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionUnionType;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if($this->has($id)) {
            $entry = $this->entries[$id];

            return $entry($this);
        }

        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $concrete)
    {
        $this->entries[$id] = $concrete;
    }

    public function resolve(string $id) 
    {
        // 1. insepct the class that we get from container
        $reflectionClass = new ReflectionClass($id);

        if(! $reflectionClass->isInstantiable()) {
            throw new ContainerException('Class "' . $id . '" is not instantiable');
        }

        // 2. insepct the constructor  class
        $constructor = $reflectionClass->getConstructor();

        if (! $constructor) {
            return new $id;
        }

        // 3. inspect the constructor parametesr dependecies
        $parameters = $constructor->getParameters();

        if(! $parameters) {
            return new $id;
        }

        // 4. if the constructor parameter is a class then try to resolve that class using the container
        $dependencies = array_map(function(ReflectionParameter $param) use ($id) {
            $name = $param->getName();
            $type = $param->getType();

            if (! $type) {
                throw new ContainerException(
                    'Failed to resolve class "' . $id . '" because param "' . $name . '" is missing a type hint'
                );
            }

            if ($type instanceof ReflectionUnionType) {
                throw new ContainerException(
                    'Failed to resolve class "' . $id . '" because of union type for param "' . $name . '" '
                );
            }

            if ($type instanceof ReflectionNamedType && ! $type->isBuiltin()) {
              return $this->get($type->getName());
            }

            throw new ContainerException(
                'Failed to resolve class "' . $id . '" because of invalid param "' . $name . '" '
            );

        }, $parameters );


        return $reflectionClass->newInstanceArgs($dependencies);
    }

}