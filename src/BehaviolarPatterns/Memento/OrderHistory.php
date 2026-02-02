<?php

declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Memento;

class OrderHistory
{
    /** @var Memento[] */
    private array $mementos = [];

    public function addMemento(Memento $memento): void
    {
        $this->mementos[] = $memento;
    }

    public function mementos(): array
    {
        return $this->mementos;
    }

    public function undone(): ?Memento
    {
        // Pop the last memento to remove the current state
        array_pop($this->mementos);

        // Get the new last memento, which is the state we want to restore to
        $memento = end($this->mementos);

        return $memento ?: null;
    }
}
