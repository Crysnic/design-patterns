<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Fundamental\Delegation\Messengers;

class SmsMessenger extends AbstractMessenger
{
    public function send(): bool
    {
        $this->logger->debug('Sent by '.__METHOD__.': '.$this->message);

        return parent::send();
    }
}
