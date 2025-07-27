<?php 
declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Iterator\Entities;

class Book
{
    private string $title;
    private string $author;
    private int $year;

    public function __construct(string $title, string $author, int $year)
    {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void 
    {
        $this->author = $author;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void 
    {
        $this->year = $year;
    }

}