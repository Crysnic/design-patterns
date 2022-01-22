<?php

declare(strict_types=1);

namespace App\Middleware\Fundamental\EventChannel\Publisher;

use App\Middleware\Fundamental\EventChannel\Channel\Event;

interface PublisherInterface
{
    public function publish(Event $event): void;
}
