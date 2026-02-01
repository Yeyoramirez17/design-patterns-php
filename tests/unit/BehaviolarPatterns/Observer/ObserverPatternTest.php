<?php

declare(strict_types=1);

use DesignPatterns\BehaviolarPatterns\Observer\Blog;
use DesignPatterns\BehaviolarPatterns\Observer\Subscriber;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

final class ObserverPatternTest extends TestCase
{
    #[TestDox("Send notifications to all blog subscribers when a new issue is released.")]
    public function test_can_notify_subscribers(): void
    {
        $blog = new Blog();
        $blog->setTitle("Blog 1");
        $blog->setContent("Content of blog 1");
        $blog->setCreatedAt(new DateTimeImmutable());

        $subscriber1 = new Subscriber("jhon@doe.com", "Jhon Doe", true);
        $subscriber2 = new Subscriber("mary@smith", "Mary Smith", true);
        $subscriber3 = new Subscriber("alex@ortega", "Alex Ortega", false);

        $blog->attach($subscriber1);
        $blog->attach($subscriber2);
        $blog->attach($subscriber3);

        $blog->releaseNewIssue();

        $this->assertCount(3, $blog->observers());
        $this->assertEquals(2, $blog->totalSubscribersToNewsletter());

        $subscriber3->setReceivedNewsletter(true);
        $this->assertEquals(3, $blog->totalSubscribersToNewsletter());
    }
}
