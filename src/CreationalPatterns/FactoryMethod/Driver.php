<?php 

namespace DesignPatterns\CreationalPatterns\FactoryMethod;
interface Driver 
{
    public function connect(array $config): Connection;

    public function info(): string;
}