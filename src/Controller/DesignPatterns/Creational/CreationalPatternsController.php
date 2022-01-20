<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Creational;

use App\Controller\DesignPatterns\AbstractDesignPatternController;
use App\Controller\DesignPatterns\Creational\AbstractFactory\GuiKitFactory;
use App\Controller\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;
use Exception;
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
            'Абстрактная фабрика',
            GuiKitFactory::getUrl(),
            GuiKitFactory::getDescription(),
            $result
        );
    }
}
