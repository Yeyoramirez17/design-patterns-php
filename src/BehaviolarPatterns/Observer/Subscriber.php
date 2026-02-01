<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Observer;

use SplSubject;

class Subscriber implements \SplObserver
{
    private string $id;
    private string $email;
    private string $name;
    private bool $receivedNewsletter = false;

    public function __construct(string $email, string $name, bool $receivedNewsletter)
    {
        $this->id = uniqid('', true);
        $this->email = $email;
        $this->name = $name;
        $this->receivedNewsletter = $receivedNewsletter;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function isReceivedNewsletter(): bool
    {
        return $this->receivedNewsletter;
    }

    public function setReceivedNewsletter(bool $receivedNewsletter): void
    {
        $this->receivedNewsletter = $receivedNewsletter;
    }

    public function update(SplSubject $subject): void
    {
        if (!$this->isReceivedNewsletter()) return;

        echo "Subscriber {$this->name} has been notified about the new magazine issue.\n";
    }
}
