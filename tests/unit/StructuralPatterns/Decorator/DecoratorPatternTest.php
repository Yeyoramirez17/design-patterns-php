<?php

declare(strict_types=1);

use DesignPatterns\StructuralPatterns\Decorator\BasicOrder;
use DesignPatterns\StructuralPatterns\Decorator\DiscountPercentageDecorator;
use DesignPatterns\StructuralPatterns\Decorator\GiftWrappingDecorator;
use DesignPatterns\StructuralPatterns\Decorator\ShippingCostDecorator;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class DecoratorPatternTest extends TestCase
{
    #[TestDox("More functionality can be added to an Order object.")]
    public function testAddDiscountToSimpleOrder(): void
    {
        $basicOrder = new BasicOrder();

        $discountOrder = new DiscountPercentageDecorator($basicOrder, 0.05);
        $this->assertEquals(14.25, $discountOrder->calculateTotalCost());

        $gifWrappingOrder = new GiftWrappingDecorator($discountOrder, 2);
        $this->assertEquals(16.25, $gifWrappingOrder->calculateTotalCost());

        $shippingCost = new ShippingCostDecorator($gifWrappingOrder, 3);
        $this->assertEquals(19.25,$shippingCost->calculateTotalCost());
    }
}