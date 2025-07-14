<?php 
namespace DesignPatterns\CreationalPatterns\FactoryMethod;

use DesignPatterns\CreationalPatterns\FactoryMethod\Driver;

class MysqlDriver implements Driver
{    
    public function __construct() { }

    public function connect(array $config): Connection
    {
        return new Connection($config);
    }
    public function info(): string
    {
        return sprintf('Connected to MySQL');
    }
}