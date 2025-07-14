<?php
namespace DesignPatterns\CreationalPatterns\FactoryMethod;

class PgsqlDriver implements Driver
{
    
    public function __construct() { }

    public function connect(array $config): Connection
    {
        return new Connection($config);
    }

    public function info(): string
    {
        return 'Connected to PostgreSQL';
    }
}