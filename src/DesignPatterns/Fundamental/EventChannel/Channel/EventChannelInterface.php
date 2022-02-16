<?php

declare(strict_types=1);

namespace App\DesignPatterns\Fundamental\EventChannel\Channel;

use App\DesignPatterns\Fundamental\EventChannel\Subscriber\SubscriberInterface;

interface EventChannelInterface
{
    public function publish(string $topic, Event $event): void;

    public function subscribe(string $topic, SubscriberInterface $subscriber): void;
}
