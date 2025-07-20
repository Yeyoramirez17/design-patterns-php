<?php 
declare(strict_types=1);

namespace DesignPatterns\StructuralPatterns\Decorator;

use DesignPatterns\StructuralPatterns\Decorator\Order;

class DiscountPercentageDecorator extends OrderDecorator
{
    private float $discountPercentage;

    public function __construct(Order $order, float $discountPercentage = 0.0)
    {
        parent::__construct($order);
        $this->discountPercentage = $discountPercentage;
    }

    public function calculateTotalCost(): float
    {
        return parent::calculateTotalCost() - (parent::calculateTotalCost() * $this->discountPercentage);
    }

    public function getDescription(): string
    {
        return sprintf("%s \n - Discount:\t%s\n - Total:\t%s", parent::getDescription(), $this->discountPercentage, $this->calculateTotalCost());
    }
}