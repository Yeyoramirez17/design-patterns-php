<?php 
declare(strict_types=1);

namespace DesignPatterns\StructuralPatterns\Decorator;

use DesignPatterns\StructuralPatterns\Decorator\Order;

class BasicOrder implements Order
{
    private const float BASE_PRICE = 15;
    private static int $id = 0;

    public function __construct()
    {
        self::$id++;
    }

    #[\Override]
    public function calculateTotalCost(): float
    {
        return self::BASE_PRICE;
    }

    #[\Override]
    public function getDescription(): string
    {
        return sprintf("\n --- Order N° %s ---\n - Base Price:\t%s", self::$id, self::BASE_PRICE);
    }
}
