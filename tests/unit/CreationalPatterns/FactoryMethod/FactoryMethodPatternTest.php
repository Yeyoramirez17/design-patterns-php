<?php

use DesignPatterns\CreationalPatterns\FactoryMethod\Connection;
use DesignPatterns\CreationalPatterns\FactoryMethod\DBType;
use DesignPatterns\CreationalPatterns\FactoryMethod\DriverFactory;
use DesignPatterns\CreationalPatterns\FactoryMethod\MysqlDriver;
use DesignPatterns\CreationalPatterns\FactoryMethod\PgsqlDriver;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

final class FactoryMethodPatternTest extends TestCase
{
    #[TestDox(text: "The driver factory can create a MysqlDriver object.")]
    public function tests_factory_can_create_mysql_driver(): void
    {
        $factory = DriverFactory::create();
        $driver = $factory->createDriver(DBType::MYSQL);

        $this->assertInstanceOf(MysqlDriver::class, $driver);
    }

    #[TestDox("The created driver is connected to a PostgreSQL DB.")]
    public function tests_the_pgsql_driver_is_connectd_to_postgresql(): void
    {
        $factory = DriverFactory::create();
        $driver = $factory->createDriver(DBType::PGSQL);

        $this->assertEquals("Connected to PostgreSQL", $driver->info());
    }

    #[TestDox(text: "The connect method returns a Connection object.")]
    public function test_the_method_connect_return_an_connection_object():void
    {
        $factory = DriverFactory::create();
        $driver = $factory->createDriver(DBType::PGSQL);

        $config = [
            'username' => 'test',
            'password' => 'test',
            'host'     => 'localhost',
            'port'     => 5432
        ];

        $obj = $driver->connect($config);

        $this->assertInstanceOf(Connection::class, $obj);

        $this->assertEquals('localhost', $obj->getHost());
        $this->assertEquals(5432, $obj->getPort());
    }
}