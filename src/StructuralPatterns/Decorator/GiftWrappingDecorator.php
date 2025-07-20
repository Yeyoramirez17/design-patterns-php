<?php 
declare(strict_types=1);

namespace DesignPatterns\StructuralPatterns\Decorator;

use DesignPatterns\StructuralPatterns\Decorator\OrderDecorator;

class GiftWrappingDecorator extends OrderDecorator
{
    private float $gifWrappingCost;
    
    public function __construct(Order $order, float $gifWrappingCost)
    {
        parent::__construct($order);
        $this->gifWrappingCost = $gifWrappingCost;
    }

    public function calculateTotalCost(): float
    {
        return parent::calculateTotalCost() + $this->gifWrappingCost;
    }

    public function getDescription(): string
    {
        return sprintf("%s\n - Gif Wrapping: %s\n - Total:\t%s", parent::getDescription(), $this->gifWrappingCost, $this->calculateTotalCost());
    }
}