<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\DesignPatternExample;
use App\DesignPatterns\Fundamental\Delegation\AppMessenger;
use App\DesignPatterns\Fundamental\EventChannel\EvenChannelJob;
use App\DesignPatterns\Fundamental\PropertyContainer\BlogPost;
use App\DesignPatterns\Fundamental\PropertyContainer\PropertyContainer;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FundamentalsPatternsController extends AbstractDesignPatternController
{
    protected string $menuId = "fundamental";

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

    /**
     * Интерфейс (англ. Interfaces)
     *
     * @Route("/fundamental/interface", name="fundamental.interface")
     */
    public function interfaceTemplate(): Response
    {
        $example = new DesignPatternExample('
        class EmailNotificator {
            private MessageFormatter $formatter;
            
            private EmailClientSetting $setting;
            
            private string[] $recipients;
            
            private EmailClient $client;
            
            public function __construct()
            {
                $this->formatter = DiContainer::get("email.messageFormatter");
                $this->setting = DiContainer::get("email.setting");
                $this->recipients = DiContainer::get("recipients.email");
                $this->client = DiContainer::get("email.client");
            }
            
            public function notify(string $message): void
            {
                $message = new Message($this->formatter->prepare($message));
                $message->setSubject($setting->getDefaultSubject());
                $message->setFrom($setting->getFrom());
                foreach ($this->recipients as $recipient) {
                    $message->addTo($recipient);
                }
                
                $this->client->send($message);
            }
        }
        
        $notificator = new EmailNotificator();
        $notificator->notify("Реестр К2134.xls не обработан: расхождение в 2 платежа(12345, 12346)");
        ', 'В данном примере отображен класс, в котором выполняется некая сложная работа,
        но при этом во вне виден простой интерфейс для запуска выполнения данной работы, не вдаваясь
        в подробности ее реализации');

        return $this->renderDesignPattern(
            'Интерфейс (Interfaces)',
            'https://ru.wikipedia.org/wiki/%D0%98%D0%BD%D1%82%D0%B5%D1%80%D1%84%D0%B5%D0%B9%D1%81_(%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)',
            [
                'В общем, интерфейс — это класс, который обеспечивает программисту простой или
                более программно-специфический способ доступа к другим классам.',
                'Интерфейс может содержать набор объектов и обеспечивать простую, высокоуровневую функциональность
                для программиста (например, Шаблон Фасад); он может обеспечивать более чистый или более
                специфический способ использования сложных классов («класс-обёртка»); он может использоваться
                в качестве «клея» между двумя различными API (Шаблон Адаптер); и для многих других целей.',
                'Другими типами интерфейсных шаблонов являются: Шаблон делегирования, Шаблон компоновщик, и Шаблон мост.'
            ],
            null,
            null,
            $example
        );
    }
}
