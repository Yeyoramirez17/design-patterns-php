<?php

declare(strict_types=1);

use DesignPatterns\BehaviolarPatterns\Memento\OrderHistory;
use DesignPatterns\BehaviolarPatterns\Memento\OrderState;
use DesignPatterns\BehaviolarPatterns\Memento\Product;
use DesignPatterns\BehaviolarPatterns\Memento\ShoppingCar;
use PHPUnit\Framework\TestCase;

final class MementoPatternTest extends TestCase
{
    public function test_can_undo_order(): void
    {
        $car = new ShoppingCar(); # Here state is CREATED
        $history = new OrderHistory();

        // Initial state
        $history->addMemento($car->save());

        $car->addProduct(new Product('Laptop 14', 749.99, 1));
        $car->addProduct(new Product('Mouse', 19.99, 1));

        // Here state is PAY
        $car->pay();
        $history->addMemento($car->save());
        // Here state is PREOCESS
        $car->process();
        $history->addMemento($car->save());

        $this->assertEquals(OrderState::PROCESSING, $car->getState());
        $this->assertCount(3, $history->mementos());

        $lastMemento = $history->undone();
        $car->restore($lastMemento);

        $this->assertEquals(OrderState::PAID, $car->getState());
        $this->assertCount(2, $history->mementos());
    }
}
