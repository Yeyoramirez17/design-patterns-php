<?php
declare(strict_types=1);

namespace DesignPatterns\StructuralPatterns\Decorator;

use DesignPatterns\StructuralPatterns\Decorator\Order;

/**
 * El patrón de diseño "Decorator" es una patrón tipo estructural, 
 * en el que permite añadir funcionaidades a objetos colocando 
 * estos objetos dentro de objetos encapsulados especiales que 
 * contienen estas funcionalidades.
 * 
 * Es una alternativa flexible a la herencia para extender la funcionalidad de un objeto.
 */
abstract class OrderDecorator implements Order
{
    private Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    #[\Override]
    public function calculateTotalCost(): float
    {
        return $this->order->calculateTotalCost();
    }

    #[\Override]
    public function getDescription(): string
    {
        return $this->order->getDescription();
    }
}