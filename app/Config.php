<?php

namespace App;

class Config
{
    protected array $config = [];

    public function __construct(array $env)
    {
        // var_dump($env);
        // exit;

        $this->config = [
            'db' => [
                'host'      =>  $env['DB_HOST'],
                'username'  =>  $env['DB_USER'],
                'pass'      =>  $env['DB_PASS'],
                'database'  =>  $env['DB_DATABASE'],
                'driver'    =>  $env['DB_DRIVER'] ?? 'mysql',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}
