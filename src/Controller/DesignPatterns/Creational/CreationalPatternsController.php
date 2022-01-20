<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Creational;

use App\Controller\DesignPatterns\AbstractDesignPatternController;
use App\Controller\DesignPatterns\Creational\AbstractFactory\GuiKitFactory;
use App\Controller\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;
use App\Controller\DesignPatterns\Creational\FactoryMethod\Forms\BootstrapDialogForm;
use App\Controller\DesignPatterns\Creational\FactoryMethod\Forms\SemanticUiForm;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationalPatternsController extends AbstractDesignPatternController
{
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
}
