<?php

declare(strict_types=1);

namespace App\Middleware\Creational\Multition;

use Psr\Log\LoggerInterface;

class MultitonJob
{
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function run(): void
    {
        $this->log("SimpleMultiton: Получаем обьект по ключу <mysql>");

        $mysql = SimpleMultiton::getInstance('mysql')->setTest('Test1');
        $this->log("SimpleMultiton: получили ".$mysql);

        $mysql->setTest("Test2");
        $this->log("SimpleMultiton: изменили состояние ".SimpleMultiton::getInstance('mysql'));

        $this->log("SimpleMultiton: получаем обьект по ключу <mongo>");
        $mongo = SimpleMultiton::getInstance('mongo');
        $this->log("SimpleMultiton: получили ".$mongo);

        $this->log("SimpleMultiton: получаем <mysql> еще раз ".SimpleMultiton::getInstance('mysql'));
        $this->log("SimpleMultiton: получаем <mongo> еще раз ".SimpleMultiton::getInstance('mongo'));

        $this->log("SimpleMultitonChild: получаем <mysql> ".SimpleMultitonChild::getInstance('mysql'));
        $this->log("SimpleMultitonChild: получаем <mongo> ".SimpleMultitonChild::getInstance('mongo'));
    }

    /**
     * @param string $message
     * @return void
     */
    private function log(string $message): void
    {
        $this->logger->debug($message);
        usleep(1100);
    }
}
