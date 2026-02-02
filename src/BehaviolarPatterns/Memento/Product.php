<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Memento;

class Product
{
    private string $id;
    private string $name;
    private float $price;
    private int $amount;
    private float $total;

    public function __construct(string $name, float $price, int $amount)
    {
        $this->id = uniqid('', true);
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
        $this->total = $this->price * $this->amount;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
    private function getTotal(): float
    {
        return $this->total;
    }
}
