<?php

declare(strict_types=1);

namespace App\DesignPatterns\Fundamental\EventChannel\Publisher;

use App\DesignPatterns\Fundamental\EventChannel\Channel\Event;

interface PublisherInterface
{
    public function publish(Event $event): void;
}
