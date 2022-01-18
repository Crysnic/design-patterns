<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Fundamental\EventChannel\Publisher;

use App\Controller\DesignPatterns\Fundamental\EventChannel\Channel\Event;
use App\Controller\DesignPatterns\Fundamental\EventChannel\Channel\EventChannelInterface;

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
