<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Memento;

class ShoppingCar
{
    private string $id;
    /** @var array<int, Product> List of products. */
    private array $products = [];
    private float $totalSale;
    private \DateTimeImmutable $createdAt;
    private OrderState $state;

    public function __construct()
    {
        $this->id = uniqid('', true);
        $this->createdAt = new \DateTimeImmutable();
        $this->totalSale = 0.0;
        $this->state = OrderState::CREATED;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
        $this->totalSale += $product->getPrice() * $product->getAmount();
    }

    public function pay(): void
    {
        $this->state = OrderState::PAID;
    }

    public function process(): void
    {
        $this->state = OrderState::PROCESSING;
    }

    public function ship(): void
    {
        $this->state = OrderState::SHIPPED;
    }

    public function deliver(): void
    {
        $this->state = OrderState::DELIVERED;
    }

    public function cancel(): void
    {
        $this->state = OrderState::CANCELED;
    }

    public function getId(): string
    {
        return $this->id;
    }
    public function getProducts(): array
    {
        return $this->products;
    }
    public function getTotalSale(): float
    {
        return $this->totalSale;
    }
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }
    public function getState(): OrderState
    {
        return $this->state;
    }

    public function save(): Memento
    {
        return new Memento(
            $this->id,
            $this->products,
            $this->totalSale,
            $this->createdAt,
            $this->state
        );
    }

    public function restore(Memento $memento): void
    {
        $this->id = $memento->id;
        $this->products = $memento->products;
        $this->totalSale = $memento->totalSale;
        $this->createdAt = $memento->createdAt;
        $this->state = $memento->state;
    }
}
