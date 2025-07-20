<?php 

declare(strict_types=1);

namespace DesignPatterns\StructuralPatterns\Decorator;

interface Order
{
    public function calculateTotalCost(): float;

    public function getDescription(): string;
}