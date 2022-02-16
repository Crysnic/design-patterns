<?php

declare(strict_types=1);

namespace App\DesignPatterns\Fundamental\EventChannel;

use App\DesignPatterns\Fundamental\EventChannel\Channel\Event;
use App\DesignPatterns\Fundamental\EventChannel\Channel\EventChannel;
use App\DesignPatterns\Fundamental\EventChannel\Publisher\Publisher;
use App\DesignPatterns\Fundamental\EventChannel\Subscriber\Subscriber;
use Psr\Log\LoggerInterface;

class EvenChannelJob
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
        $channel = new EventChannel($this->logger);

        $highGardenGroup = new Publisher('highgarden-news', $channel);

        $winterfellNews = new Publisher('winterfell-news', $channel);
        $winterfellDaily = new Publisher('winterfell-news', $channel);

        $sansa = new Subscriber('Sansa Stark', $this->logger);
        $arya = new Subscriber('Arya Stark', $this->logger);
        $cersei = new Subscriber('Cersei Lannister', $this->logger);
        $snow = new Subscriber('Jon Snow', $this->logger);

        $channel->subscribe('highgarden-news', $cersei);

        $channel->subscribe('winterfell-news', $sansa);

        $channel->subscribe('highgarden-news', $arya);
        $channel->subscribe('winterfell-news', $arya);

        $channel->subscribe('winterfell-news', $snow);

        $highGardenGroup->publish(new Event('Смерть Волка', 'Ура, убит еще один из старков'));
        $winterfellNews->publish(new Event('Ходоки', 'Рекомедуем не умерать возле стены'));
        $winterfellDaily->publish(new Event('Санса + Рамси', 'Поговаривают что Санса запала на Рамси'));
    }

    public static function getDescription(): array
    {
        return [
            'Основной шаблон проектирования, в котором обьект внешне выражает некоторое поведение,
                но в реальности передает ответственность за выполнение этого поведения связанному обьекту.',
            'Шаблон является фундаментальной абстракцией, на основе которой реализованы другие шаблоны -
                композиция, примиси и аспекты.'
        ];
    }
}
