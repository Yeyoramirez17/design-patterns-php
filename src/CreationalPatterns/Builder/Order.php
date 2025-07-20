<?php declare(strict_types=1);

namespace DesignPatterns\CreationalPatterns\Builder; 

use DateTimeInterface;
class Order
{
    private string $id;
    private int $amount;
    private float $discount;
    private float $total;
    private DateTimeInterface $orderDate;

    public function __construct(int $amount, float $discount, float $total) 
    {
        $this->id        = md5(uniqid((string) mt_rand(), true));
        $this->amount    = $amount;
        $this->discount  = $discount;
        $this->total     = $total;
        $this->orderDate = new \DateTime();
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
    public function getDiscount(): float
    {
        return $this->discount;
    }
    public function getTotal(): float
    {
        return $this->total;
    }
    public function getDateOrder(): DateTimeInterface
    {
        return $this->orderDate;
    }
}