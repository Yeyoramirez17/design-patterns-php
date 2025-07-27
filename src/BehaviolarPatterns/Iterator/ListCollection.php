<?php 
declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Iterator;

use DesignPatterns\BehaviolarPatterns\Iterator\Aggregate;
use DesignPatterns\BehaviolarPatterns\Iterator\ObjectIterator;
use DesignPatterns\BehaviolarPatterns\Iterator\ListIterator;

/**
 * @template T of object
 */
class ListCollection implements Aggregate
{
    /** @var array<T> $items*/
    private array $items;

    /**  @param class-string<T> $className */
    private string $className;

    public int $length {
        get => count($this->items);
    }

    /** @param class-string<T> $className */
    public function __construct(string $className)
    {
        if(!class_exists($className))
            throw new \Exception("Class not found");

        $this->className = $className;
        $this->items = [];

    }

    /**
     * Adds an item to the collection.
     * 
     * @param T $item 
     * @throws \InvalidArgumentException
     * @return void
     */
    public function add(mixed $item): void 
    {
        if(!$item instanceof $this->className)
            throw new \InvalidArgumentException("Item must be an instance of {$this->className}");

        $this->items[] = $item;
    }

    /**
     * Removes an item from the collection by index.
     * 
     * @param int $index
     * @throws \Exception
     * @return T 
     */
    public function remove(int $index): mixed
    {
        if(!isset($this->items[$index]))
            throw new \Exception("Item not found at index {$index}");

        /** @var T $item */
        $item = $this->items[$index];

        unset($this->items[$index]);
        // Re-index the array to maintain sequential keys
        $this->items = array_values($this->items);

        return $item;
    }

    /**
     * Gets an item from the collection by index.
     * 
     * @param int $index
     * @throws \Exception
     * @return T 
     */
    public function get(int $index): mixed
    {
        if(!isset($this->items[$index]))
            throw new \Exception("Item not found at index {$index}");

        return $this->items[$index];
    }

    /**
     * Sets an item in the collection at a specific index.
     * @param int $index
     * @param object $value
     * @throws \Exception
     * @return void
     */
    public function set(int $index, mixed $value): void
    {
        if(!isset($this->items[$index]))
            throw new \Exception("Item not found at index {$index}");

        if(!$value instanceof $this->className)
            throw new \InvalidArgumentException("Value must be an instance of {$this->className}");

        $this->items[$index] = $value;
    }

    /**
     * Clears the collection, removing all items.
     * 
     * @return void
     */
    #[\Override]
    public function clear(): void
    {
        $this->items = [];
    }

    public function getIterator(): \Traversable
    {
        return new ObjectListIterator($this->items);
    }


}