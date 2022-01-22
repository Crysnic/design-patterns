<?php

declare(strict_types=1);

namespace App\Middleware\Fundamental\EventChannel\Channel;

use App\Middleware\Fundamental\EventChannel\Subscriber\SubscriberInterface;
use Psr\Log\LoggerInterface;

class EventChannel implements EventChannelInterface
{
    private array $topics = [];

    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function publish(string $topic, Event $event): void
    {
        if (empty($this->topics[$topic])) {
            return;
        }

        /** @var SubscriberInterface $subscriber */
        foreach ($this->topics[$topic] as $subscriber) {
            $subscriber->notify($event);
        }
    }

    public function subscribe(string $topic, SubscriberInterface $subscriber): void
    {
        $this->topics[$topic][] = $subscriber;

        $this->logger->info("{$subscriber->getName()} подписан(а) на [{$topic}]");
    }
}
