<?php

namespace DesignPatterns\BehaviolarPatterns\Observer;

use SplObjectStorage;
use SplObserver;
use SplSubject;

class Blog implements SplSubject
{
    /**
     * @var SplObjectStorage List of subscribers.
     */
    private SplObjectStorage $observers;

    private string $title;
    private string $content;
    private \DateTimeImmutable $createdAt;
    private \DateTimeImmutable $publishedAt;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->offsetSet($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->offsetUnset($observer);
    }

    public function getObserver(SplObserver $observer): ?SplObserver
    {
        return $this->observers->offsetGet($observer) ?? null;
    }

    public function observers(): SplObjectStorage
    {
        return $this->observers;
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function totalSubscribersToNewsletter(): int
    {
        $count = 0;
        foreach ($this->observers as $observer) {
            if ($observer->isReceivedNewsletter()) {
                $count++;
            }
        }
        return $count;
    }

    public function releaseNewIssue(): void
    {
        // Logic for releasing a new issue of the magazine.
        echo "A new issue of the magazine has been released!\n";
        // Notify all subscribers about the new issue.
        $this->notify();
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }
    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
    public function getPublishedAt(): \DateTimeImmutable
    {
        return $this->publishedAt;
    }
    public function setPublishedAt(\DateTimeImmutable $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }
}
