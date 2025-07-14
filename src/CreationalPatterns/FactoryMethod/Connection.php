<?php 
namespace DesignPatterns\CreationalPatterns\FactoryMethod;

class Connection
{
    private string $username;
    private string $password;
    private string $host;
    private int $port;

    private ?\PDO $pdo = null;

    public function __construct(array $config)
    {
        $this->username = $config['username'] ?? 'empty';
        $this->password = $config['password'] ?? 'empty';
        $this->host = $config['host'] ?? 'empty';
        $this->port = $config['port'] ?? 3452;
    }

    public function status(): string 
    {
        return sprintf("Connect successfuly ...");
    }

    public function getHost(): ?string 
    {
        return $this->host;
    }
    public function getPort(): int 
    {
        return $this->port;
    }

    public function pdo(): \PDO
    {
        return $this->pdo;
    } 
}