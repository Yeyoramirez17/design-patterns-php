<?php
declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Iterator;


/**
 * @template T of object
 */
final class ObjectListIterator implements ObjectIterator
{

    /** @var array<int, T> $items */
    private array $items;

    /**
     * Cursor index for the iterator.
     * @var int $index
     */
    private int $index;

    /** @param array<int, T> $items */
    public function __construct(array $items)
    {
        $this->items = $items;
        $this->index = 0;
    }

    #[\Override]
    public function next(): void
    {
        $this->index++;
    }

    #[\Override]
    public function current(): mixed
    {
        return $this->items[$this->index];
    }

    #[\Override]
    public function key(): int
    {
        return $this->index;
    }

    #[\Override]
    public function rewind(): void
    {
        $this->index = 0;
    }

    #[\Override]
    public function valid(): bool
    {
        return $this->index < count( $this->items);
    }

    #[\Override]
    public function count(): int
    {
        return count($this->items);
    }
}