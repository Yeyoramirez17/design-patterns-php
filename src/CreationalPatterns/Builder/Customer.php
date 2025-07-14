<?php

namespace DesignPatterns\CreationalPatterns\Builder;

use DesignPatterns\CreationalPatterns\Builder\Address;
use DesignPatterns\CreationalPatterns\Builder\Genre;


final class Customer
{
    private ?string $id;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $email;
    private ?string $phone;
    private ?Genre $genre;
    private ?TypeCustomer $typeCustomer;
    private ?Address $address;

    /** @var array<int, Order> */
    private array $orders;

    public function __construct(
        ?string $firstName  = null,
        ?string $lastName   = null,
        ?string $email      = null,
        ?string $phone      = null,
        ?Genre $genre       = null,
        ?TypeCustomer $typeCustomer = null,
        ?Address $address   = null,
        ?array $orders      = null
    ) {
        $this->id           = md5(uniqid(mt_rand(), true));
        $this->firstName    = $firstName;
        $this->lastName     = $lastName;
        $this->email        = $email;
        $this->phone        = $phone;
        $this->genre        = $genre;
        $this->typeCustomer = $typeCustomer ?? TypeCustomer::STANDAR;
        $this->address      = $address;
        $this->orders       = $orders ?? [];
    }

    private function __clone(){ }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFullName(): string 
    {
        return "$this->firstName $this->lastName";

    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getGenre(): Genre
    {
        return $this->genre;
    }

    public function getTypeCustomer(): ?TypeCustomer
    {
        return $this->typeCustomer;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function getOrders(): array
    {
        return $this->orders;
    }

}