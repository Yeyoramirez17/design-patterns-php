<?php 

declare(strict_types=1);

namespace DesignPatterns\StructuralPatterns\Decorator;

use DesignPatterns\StructuralPatterns\Decorator\Order;
use DesignPatterns\StructuralPatterns\Decorator\OrderDecorator;

class ShippingCostDecorator extends OrderDecorator
{
    private float $shippingFee = 0.0;

    public function __construct(Order $order, float $shippingFee)
    {
        parent::__construct($order);
        $this->shippingFee = $shippingFee;
    }

    public function calculateTotalCost(): float
    {
        return parent::calculateTotalCost() + $this->shippingFee;
    }

    public function getDescription(): string
    {
        return sprintf("%s \n - ShippingFee:\t%s\n - Total:\t%s", parent::getDescription(), $this->shippingFee, $this->calculateTotalCost());
    }
}