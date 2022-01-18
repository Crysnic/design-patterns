<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Fundamental;

use App\Controller\DesignPatterns\AbstractDesignPatternController;
use App\Controller\DesignPatterns\Fundamental\Delegation\AppMessenger;
use App\Controller\DesignPatterns\Fundamental\EventChannel\EvenChannelJob;
use App\Controller\DesignPatterns\Fundamental\PropertyContainer\BlogPost;
use App\Controller\DesignPatterns\Fundamental\PropertyContainer\PropertyContainer;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FundamentalsPatternsController extends AbstractDesignPatternController
{
    /**
     * Контейнер свойств (англ. property container)
     *
     * @Route("/fundamental/property-container", name="fundamental.propertyContainer")
     */
    public function propertyContainer(): Response
    {
        $item = new BlogPost();
        $item->setTitle('Заголовок статьи');
        $item->setCategoryId(10);

        $item->setPropertyContainer(new PropertyContainer());

        $item->getPropertyContainer()->addProperty('view_count', 100);

        $item->getPropertyContainer()->addProperty('type', 'important');
        $item->getPropertyContainer()->addProperty('last_update', '2022-12-17 21:02:44');

        $item->getPropertyContainer()->deleteProperty('type');
        $item->getPropertyContainer()->setProperty('last_update', '2022-12-17 21:03:47');

        return $this->renderDesignPattern(
            'Контейнер свойств',
            PropertyContainer::getLink(),
            PropertyContainer::getDescription(),
            $item
        );
    }

    /**
     * Делегирование (англ. delegation)
     *
     * @Route("/fundamental/delegation", name="fundamental.delegation")
     */
    public function delegation(LoggerInterface $logger): Response
    {
        $messenger = new AppMessenger($logger);

        $messenger->setSender('sender1@email.com')
            ->setRecipient('recipient1@email.com')
            ->setMessage('Hello from dark side!')
            ->send();

        $messenger->toSms()->setSender('sender2@email.com')
            ->setRecipient('recipient2@email.com')
            ->setMessage('Hi :)')
            ->send();

        return $this->renderDesignPattern(
            'Делегирование (Delegation)',
            'https://ru.wikipedia.org/wiki/%D0%A8%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%B4%D0%B5%D0%BB%D0%B5%D0%B3%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F',
            [
                'Основной шаблон проектирования, в котором обьект внешне выражает некоторое поведение,
                но в реальности передает ответственность за выполнение этого поведения связанному обьекту.',
                'Шаблон является фундаментальной абстракцией, на основе которой реализованы другие шаблоны -
                композиция, примиси и аспекты.'
            ],
            $messenger,
            'Логи работы шаблона в профайлере'
        );
    }

    /**
     * Канал событий (англ. Event Channel)
     *
     * @Route("/fundamental/event-channel", name="fundamental.eventChannel")
     */
    public function eventChannel(LoggerInterface $logger): Response
    {
        $job = new EvenChannelJob($logger);
        $job->run();

        return $this->renderDesignPattern(
            'Канал событий (Event Channel)',
            'https://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D0%BD%D0%B0%D0%BB_%D1%81%D0%BE%D0%B1%D1%8B%D1%82%D0%B8%D0%B9_(%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)',
            EvenChannelJob::getDescription(),
            null,
            'Логи работы шаблона в профайлере'
        );
    }
}
