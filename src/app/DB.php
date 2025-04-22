<?php

namespace App;

use PDO;
use PDOException;

class DB 
{
    private PDO $pdo;

    public function __construct(private array $config)
    {
        $defaultOptions = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->pdo = new PDO(
                        $this->config['driver']. $this->config['host']  . ';dbname=' . $this->config['db'], 
                        $this->config['user'], 
                        $this->config['pass'],
                        $this->config['options'] ?? $defaultOptions
                    );
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->pdo, $name], $arguments);
    }
}