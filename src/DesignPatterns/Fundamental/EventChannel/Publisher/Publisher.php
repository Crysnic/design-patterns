<?php

declare(strict_types=1);

namespace App\DesignPatterns\Fundamental\EventChannel\Publisher;

use App\DesignPatterns\Fundamental\EventChannel\Channel\Event;
use App\DesignPatterns\Fundamental\EventChannel\Channel\EventChannelInterface;

class Publisher implements PublisherInterface
{
    private string $topic;

    private EventChannelInterface $eventChannel;

    /**
     * @param string $topic
     * @param EventChannelInterface $eventChannel
     */
    public function __construct(string $topic, EventChannelInterface $eventChannel)
    {
        $this->topic = $topic;
        $this->eventChannel = $eventChannel;
    }

    public function publish(Event $event): void
    {
        $this->eventChannel->publish($this->topic, $event);
    }
}
