<?php
declare(strict_types=1);

use DesignPatterns\BehaviolarPatterns\Iterator\Entities\Book;
use DesignPatterns\BehaviolarPatterns\Iterator\Entities\EBook;
use DesignPatterns\BehaviolarPatterns\Iterator\Entities\Magazine;
use DesignPatterns\BehaviolarPatterns\Iterator\ListCollection;
use DesignPatterns\BehaviolarPatterns\Iterator\ObjectListIterator;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

final class IteratorPatternTest extends TestCase
{
    #[TestDox("Can save and iterate over Book objects.")]
    public function testCanIteratorSaveBookObjects(): void
    {
        $collection = new ListCollection(Book::class);

        $collection->add(new Book('Book 1', 'Author 1', 2020));
        $collection->add(new Book('Book 2', 'Author 2', 2021));
        $collection->add(new Book('Book 3', 'Author 3', 2022));
        $collection->add(new Book('Book 4', 'Author 4', 2023));
        $collection->add(new Book('Book 5', 'Author 5', 2024));

        $this->assertEquals(5, $collection->length);

        /** @var ObjectListIterator $iterator */
        $iterator = $collection->getIterator();

        $this->assertCount(5, $iterator);

        while ($iterator->valid()) {
            /** @var Book $book */
            $book = $iterator->current();
            $key = $iterator->key();

            // echo "{$key} - {$book->getTitle()} \n";

            $this->assertInstanceOf(Book::class, $book);
            $this->assertIsInt($key);

            $iterator->next();
        }
    }

    #[TestDox("Can collection store objects inhereting from Book.")]
    public function testCollectionCanStoreObjectsInheretingFromBook(): void
    {
        $collection = new ListCollection(Book::class);
        $collection->add(new EBook('EBook 1', 'Author 1', 2020, 'PDF', 1024));
        $collection->add(new EBook('EBook 2', 'Author 2', 2020, 'PDF', 1024));
        $collection->add(new EBook('EBook 3', 'Author 3', 2020, 'PDF', 1024));
        $collection->add(new EBook('EBook 4', 'Author 4', 2020, 'PDF', 1024));
        $collection->add(new EBook('EBook 5', 'Author 5', 2020, 'PDF', 1024));

        $this->assertContainsOnlyInstancesOf(Book::class, $collection);

        /**  @var ObjectListIterator */
        $iterator = $collection->getIterator();

        while ($iterator->valid()) {
            $eBook = $iterator->current();

            $this->assertInstanceOf(Book::class, $eBook);

            $iterator->next();
        }

        $this->expectException(\InvalidArgumentException::class);
        $collection->add(new Magazine("Magazine 1", "Author 1", 2020));
    }

    #[TestDox("Can collection support common operations.")]
    public function testCollectionSupportsCommonOperations(): void
    {
        $collection = new ListCollection(Book::class);

        $this->assertEquals(0, $collection->length);

        $collection->add(new Book('Book 1', 'Author 1', 2020));
        $collection->add(new Book('Book 2', 'Author 2', 2021));
        $collection->add(new Book('Book 3', 'Author 3', 2022));

        $this->assertEquals(3, $collection->length);

        $collection->remove(1);
        $this->assertEquals(2, $collection->length);

        /** @var Book */
        $book = $collection->get(0);
        $this->assertEquals('Book 1', $book->getTitle());

        $book->setTitle('Book 1 Updated');
        $book->setYear(2019);

        $collection->set(0, $book);

        /** @var Book */
        $bookUpdated = $collection->get(0);
        $this->assertEquals('Book 1 Updated', $bookUpdated->getTitle());

        $keys = [];

        foreach ($collection as $index => $book) {
            $keys[] = $index;
            $this->assertInstanceOf(Book::class, $book);
            echo "- {$index}. {$book->getTitle()}.\n";
        }

        $this->assertCount(2, $keys);
    }

    #[TestDox("Collection throws exception when removing invalid index.")]
    public function testCollectionThrowsExceptionOnInvalidRemove(): void
    {
        $collection = new ListCollection(Book::class);
        $collection->add(new Book('Book 1', 'Author 1', 2020));

        $this->expectException(\Exception::class);
        $collection->remove(5); // Índice que no existe
    }
}