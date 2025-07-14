<?php 
namespace DesignPatterns\CreationalPatterns\FactoryMethod;

enum DBType: string
{
    case MYSQL = 'mysql';
    case PGSQL = 'psql';
    case SQLITE = 'sqlite';
    
}