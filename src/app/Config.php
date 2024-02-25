<?php

namespace App;


class Config
{
    private array $config;
    public function __construct(array $config)
    {
        $this->config = [
            'db' => [
                'host' => $config['DB_HOST'],
                'database' => $config['DB_DATABASE'],
                'user' => $config['DB_USER'],
                'password' => $config['DB_PASS'],
                'driver' => $config['DB_DRIVER'] ?? 'mysql',
            ]
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}
