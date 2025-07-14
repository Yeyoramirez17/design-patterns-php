<?php 

namespace DesignPatterns\CreationalPatterns\FactoryMethod;


class DriverFactory
{
    public function createDriver(DBType $type): Driver
    {
        return match($type)
        {
            DBType::MYSQL  => new MysqlDriver(),
            DBType::PGSQL  => new PgsqlDriver(),
            DBType::SQLITE => new SqliteDriver(),
            default        => new MysqlDriver(),
        };
    }

    public static function create(): self
    {
        return new self();
    }
}