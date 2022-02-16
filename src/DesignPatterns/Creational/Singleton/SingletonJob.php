<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\Singleton;

use Exception;
use Psr\Log\LoggerInterface;

class SingletonJob
{
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function run()
    {
        $this->logger->debug('Пытаемся получить Singleton через new');
        usleep(1100);
        try {
            new SimpleSingleton();
        } catch (Exception $e) {
            $this->logger->warning($e->getMessage());
        }

        usleep(1100);
        $this->logger->debug('Пытаемся получить через метод');
        usleep(1100);
        $singleton = SimpleSingleton::getInstance();
        $this->logger->debug('Singleton: '.$singleton);

        usleep(1100);
        $this->logger->debug('Устанавливаем значение для свойства test');
        usleep(1100);
        $singleton->setTest('Данные для шаблона');
        $this->logger->debug('Singleton: '.$singleton);

        usleep(1100);
        $this->logger->debug('Снова получаем Singleton через метод');
        usleep(1100);
        $singleton = SimpleSingleton::getInstance();
        $this->logger->debug('Singleton: '.$singleton);

        usleep(1100);
        $this->logger->debug('Пытаемся еще раз получить Singleton через new');
        usleep(1100);
        try {
            new SimpleSingleton();
        } catch (Exception $e) {
            $this->logger->warning($e->getMessage());
        }

        usleep(1100);
        $this->logger->debug('Пытаемся склонировать Singleton');
        usleep(1100);
        try {
            clone SimpleSingleton::getInstance();
        } catch (Exception $e) {
            $this->logger->warning($e->getMessage());
        }
    }
}
