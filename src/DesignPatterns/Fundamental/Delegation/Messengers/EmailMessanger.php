<?php

declare(strict_types=1);

namespace App\DesignPatterns\Fundamental\Delegation\Messengers;

class EmailMessanger extends AbstractMessenger
{
    public function send(): bool
    {
        $this->logger->debug('Sent by '.(new \ReflectionClass($this))->getShortName().': '.$this->message);

        return parent::send();
    }

}
