<?php
declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Iterator\Entities;

class EBook extends Book
{
    private string $fileFormat;
    private int $fileSize;

    public function __construct(string $title, string $author, int $year, string $fileFormat, int $fileSize)
    {
        parent::__construct($title, $author, $year);
        $this->fileFormat = $fileFormat;
        $this->fileSize = $fileSize;
    }

    public function setFileFormat(string $fileFormat): void
    {
        $this->fileFormat = $fileFormat;
    }

    public function getFileFormat(): string
    {
        return $this->fileFormat;
    }

    public function setFileSize(int $fileSize): void
    {
        $this->fileSize = $fileSize;
    }
    
    public function getFileSize(): int
    {
        return $this->fileSize;
    }
}
