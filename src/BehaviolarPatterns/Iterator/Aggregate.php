<?php declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Iterator;

/**
 * @template T
 */
interface Aggregate extends \IteratorAggregate
{

    /**
     * Adds an item to the collection.
     * 
     * @param T $item
     * @return void
     */
    public function add(mixed $item): void;

    /**
     * Removes an item from the collection by index.
     * 
     * @param int $index
     * @throws \Exception
     * @return T
     */
    public function remove(int $index): mixed;

    /**
     * Returns the item at the specified index.
     * @param int $index
     * @return T
     * @throws \Exception
    */
    public function set(int $index, mixed $item): void;

    /**
     * Gets the item at the specified index.
     * 
     * @param int $index
     * @return T
     * @throws \Exception
     */
    public function get(int $index): mixed;

    /**
     * Clears the collection.
     * 
     * @return void
     */
    public function clear(): void;
}