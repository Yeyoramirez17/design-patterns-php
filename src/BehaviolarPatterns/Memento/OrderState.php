<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Memento;

enum OrderState: string
{
    case CREATED = 'created';
    case PAID = 'paid';
    case PROCESSING = 'processing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELED = 'canceled';
}
