<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Creational\SimpleFactory;

use App\Controller\DesignPatterns\Fundamental\Delegation\MessengerInterface;
use App\Controller\DesignPatterns\Fundamental\Delegation\Messengers\EmailMessanger;
use App\Controller\DesignPatterns\Fundamental\Delegation\Messengers\SmsMessenger;
use Psr\Log\LoggerInterface;

/**
 * Простая фабрика https://refactoring.guru/ru/design-patterns/factory-comparison
 */
class MessengerSimpleFactory
{
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param string $type
     * @return MessengerInterface
     * @throws \Exception
     */
    public function build(string $type): MessengerInterface
    {
        switch ($type) {
            case 'email':
                return new EmailMessanger($this->logger);
            case 'sms':
                return new SmsMessenger($this->logger);
            default:
                throw new \Exception('Unsupported type <'.$type.'>');
        }
    }

    public static function getDescription(): array
    {
        return [
            'это класс, в котором есть один метод с большим условным оператором, выбирающим создаваемый продукт.
            Этот метод вызывают с неким параметром, по которому определяется какой из продуктов нужно создать.
            У простой фабрики, обычно, нет подклассов.'
        ];
    }
}
