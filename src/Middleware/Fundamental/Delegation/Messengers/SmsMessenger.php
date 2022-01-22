<?php

declare(strict_types=1);

namespace App\Middleware\Fundamental\Delegation\Messengers;

class SmsMessenger extends AbstractMessenger
{
    public function send(): bool
    {
        $this->logger->debug('Sent by '.(new \ReflectionClass($this))->getShortName().': '.$this->message);

        return parent::send();
    }
}
