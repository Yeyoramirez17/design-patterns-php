<?php declare(strict_types=1);

namespace DesignPatterns\CreationalPatterns\Builder;

final class CustomerBuilder
{
    private ?string $firstName = null;
    private ?string $lastName = null;
    private ?string $email = null;
    private ?string $phone = null;
    private ?Genre $genre = null;
    private ?TypeCustomer $typeCustomer = null;
    private ?Address $address = null;

    /** @var array<int, Order> */
    private array $orders;

    public function firstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function lastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function email(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function phone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function genre(Genre $genre): self
    {
        $this->genre = $genre;
        return $this;
    }

    public function typeCustomer(TypeCustomer $typeCustomer): self
    {
        $this->typeCustomer = $typeCustomer;
        return $this;
    }

    public function address(Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function orders(array $orders): self
    {
        $this->orders = $orders;
        return $this;
    }
    public function addOrder( Order $newOrder ): self
    {
        if(!in_array($newOrder, $this->orders)) 
        {
            $this->orders[] =$newOrder;
        }
        return $this;
    }
    
    public function build(): Customer
    {
        return new Customer(
            firstName: $this->firstName,
            lastName: $this->lastName,
            email: $this->email,
            phone: $this->phone,
            genre: $this->genre,
            typeCustomer: $this->typeCustomer,
            address: $this->address,
            orders: $this->orders
        );
    }
}