<?php

declare(strict_types=1);

namespace App\Attributes;

use Attribute;
use App\Interface\RouteInterface;

#[Attribute]
class Route implements RouteInterface
{
    public function __construct(public string $routePath, public string $method = 'get')
    {
        
    }
}