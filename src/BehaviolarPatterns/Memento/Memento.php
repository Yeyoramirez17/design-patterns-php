<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Memento;

class Memento
{
    public function __construct(
        public readonly string $id,
        public readonly array $products,
        public readonly float $totalSale,
        public readonly \DateTimeImmutable $createdAt,
        public readonly OrderState $state
    ) {}
}
