<?php

declare(strict_types=1);

namespace App\Controller;

use App\Middleware\Creational\AbstractFactory\GuiKitFactory;
use App\Middleware\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;
use App\Middleware\Creational\Builder\BlogPostBuilder;
use App\Middleware\Creational\Builder\BuilderJob;
use App\Middleware\Creational\FactoryMethod\Forms\SemanticUiForm;
use App\Middleware\Creational\Multition\MultitonJob;
use App\Middleware\Creational\Multition\SimpleMultiton;
use App\Middleware\Creational\SimpleFactory\MessengerSimpleFactory;
use App\Middleware\Creational\Singleton\SimpleSingleton;
use App\Middleware\Creational\Singleton\SingletonJob;
use App\Middleware\Creational\StaticFactory\RegistryFactory;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationalPatternsController extends AbstractDesignPatternController
{
    protected string $menuId = "creational";

    private GuiFactoryInterface $guiKit;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->guiKit = (new GuiKitFactory())->getFactory('semantic-ui');
    }

    /**
     * Абстрактная фабрика (англ. abstract factory)
     *
     * @Route("/creational/abstract-factory", name="creational.abstractFactory")
     */
    public function abstractFactory(): Response
    {
        $result[] = $this->guiKit->buildButton()->draw();
        $result[] = $this->guiKit->buildCheckBox()->draw();

        return $this->renderDesignPattern(
            'Абстрактная фабрика (abstract factory)',
            GuiKitFactory::getUrl(),
            GuiKitFactory::getDescription(),
            $result
        );
    }

    /**
     * Фабричный метод (англ. factory method)
     *
     * @Route("/creational/factory-method", name="creational.factoryMethod")
     */
    public function factoryMethod(LoggerInterface $logger): Response
    {
        $form = new SemanticUiForm();
        $result = $form->render();
        $logger->debug('Result: '.json_encode($result, JSON_UNESCAPED_UNICODE));

        return $this->renderDesignPattern(
            'Фабричный метод (factory method)',
            'https://refactoring.guru/ru/design-patterns/factory-method',
            [
                'шаблон проектирования, который определяет общий интерфейс для создания объектов в суперклассе,
                позволяя подклассам изменять тип создаваемых объектов.',
                'Данный шаблон реализует некую механику в родительском суперклассе, а создание обьекта(ов)
                который выполняет эту механику, возлагает на дочерние классы'
            ],
            $form,
            'Результат работы шаблона в профайлере'
        );
    }

    /**
     * Простая фабрика (англ. simple factory)
     *
     * @Route("/creational/simple-factory", name="creational.simpleFactory")
     */
    public function simpleFactory(LoggerInterface $logger): Response
    {
        $logger->debug('Инициализируем простую фабрику MessengerSimpleFactory');
        $factory = new MessengerSimpleFactory($logger);

        $logger->debug('Получаем из фабрики EmailMessenger и отправляем письмо');
        $factory->build('email')->setMessage('Все ли ок')->send();

        $logger->debug('Получаем из фабрики SMSMessenger и отправляем СМС');
        $factory->build('sms')->setMessage('Ты чего молчишь?')->send();

        return $this->renderDesignPattern(
            'Простая фабрика (Simple factory)',
            'https://refactoring.guru/ru/design-patterns/factory-comparison',
            MessengerSimpleFactory::getDescription(),
            null,
            'Результат работы шаблона в профайлере'
        );
    }

    /**
     * Статическая фабрика (англ. static factory)
     *
     * @Route("/creational/static-factory", name="creational.staticFactory")
     */
    public function staticFactory(LoggerInterface $logger): Response
    {
        $logger->debug('Получаем с фабрики реестр с id 1 и отправляем его');
        $logger->debug(
            RegistryFactory::build(1)->sendToProvider()
        );

        $logger->debug('Получаем с фабрики реестр с id 2 и отправляем его');
        $logger->debug(
            RegistryFactory::build(2)->sendToProvider()
        );

        return $this->renderDesignPattern(
            'Статическая фабрика (Static factory)',
            '',
            ['То же самое что Простая фабрика, но для создания новых обьектов используется статический метод.'],
            null,
            'Результат работы шаблона в профайлере'
        );
    }

    /**
     * Одиночка (англ. singleton)
     *
     * @Route("/creational/singleton", name="creational.singleton")
     */
    public function singleton(LoggerInterface $logger): Response
    {
        (new SingletonJob($logger))->run();

        return $this->renderDesignPattern(
            'Одиночка (Singleton)',
            'https://refactoring.guru/ru/design-patterns/singleton',
            SimpleSingleton::getDescription(),
            null,
            'Результат работы шаблона в профайлере'
        );
    }

    /**
     * Пул одиночек (англ. multiton)
     *
     * @Route("/creational/multiton", name="creational.multiton")
     */
    public function multiton(LoggerInterface $logger): Response
    {
        (new MultitonJob($logger))->run();

        return $this->renderDesignPattern(
            'Пул одиночек (Multiton)',
            SimpleMultiton::getUrl(),
            SimpleMultiton::getDescription(),
            null,
            'Результат работы шаблона в профайлере'
        );
    }

    /**
     * Строитель (англ. builder)
     *
     * @Route("/creational/builder", name="creational.builder")
     */
    public function builder(LoggerInterface $logger): Response
    {
        (new BuilderJob($logger))->run();

        return $this->renderDesignPattern(
            'Строитель (Builder)',
            BuilderJob::getUrl(),
            BuilderJob::getDescription(),
            null,
            'Результат работы шаблона в профайлере'
        );
    }
}
