<?php

declare(strict_types=1);

use DesignPatterns\CreationalPatterns\Builder\Address;
use DesignPatterns\CreationalPatterns\Builder\Customer;
use DesignPatterns\CreationalPatterns\Builder\CustomerBuilder;
use DesignPatterns\CreationalPatterns\Builder\Genre;
use DesignPatterns\CreationalPatterns\Builder\Order;
use DesignPatterns\CreationalPatterns\Builder\TypeCustomer;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

final class BuilderPatternTest extends TestCase
{
    #[TestDox('Can the CustomerBuilder create an instance of the Customer class.')]
    public function test_customer_builder_can_create_customer_object(): void
    {
        $object = (new CustomerBuilder())
            ->firstName('Jhon')
            ->lastName('Doe')
            ->email('jhon@doe.net')
            ->phone('5732109871')
            ->genre(Genre::MALE)
            ->typeCustomer(TypeCustomer::PREMIUN)
            ->address(new Address('United Kingdom', 'London', '22B Baker Street'))
            ->orders([
                new Order(4, 0.04, 2000),
                new Order(1, 0.0, 520),
                new Order(8, 0.08, 3200),
            ])
            ->build();
        
        $this->assertInstanceOf(Customer::class, $object);
        $this->assertEquals('Doe', $object->getLastName());
        $this->assertEquals('Jhon Doe', $object->getFullName());
        $this->assertEquals(TypeCustomer::PREMIUN, $object->getTypeCustomer());
        $this->assertInstanceOf(Address::class, $object->getAddress());
        $this->assertIsIterable($object->getOrders());
        $this->assertCount(3, $object->getOrders());

    }
}