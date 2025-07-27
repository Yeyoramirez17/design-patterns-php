<?php
declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Iterator\Entities;

class Magazine
{
    private string $title;
    private string $publisher;
    private int $issue;

    public function __construct(string $title, string $publisher, int $issue)
    {
        $this->title = $title;
        $this->publisher = $publisher;
        $this->issue = $issue;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function getIssue(): int
    {
        return $this->issue;
    }
}