<?php declare(strict_types=1);

namespace DesignPatterns\CreationalPatterns\Builder;

readonly class Address
{
    private string $country;
    private string $city;
    private ?string $address;

    public function __construct(string $country, string $city, ?string $address) 
    {
        $this->country = $country;
        $this->city    = $city;
        $this->address = $address;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
}