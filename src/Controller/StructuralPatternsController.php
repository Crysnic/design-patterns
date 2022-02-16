<?php

declare(strict_types=1);

namespace App\Controller;

use App\DesignPatterns\Structural\Adapter\AdapterJob;
use App\DesignPatterns\Structural\Adapter\DistanceCalculatorAdapter;
use App\DesignPatterns\Structural\Bridge\BridgeDemo;
use App\DesignPatterns\Structural\Facade\OrderSaveFacade;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StructuralPatternsController extends AbstractDesignPatternController
{
    protected string $menuId = "structural";

    /**
     * Фасад (англ. facade)
     *
     * @Route("/structural/facade", name="structural.facade")
     */
    public function facade(LoggerInterface $logger): Response
    {
        // валидируем данные из запроса, если все ок отдаем в фасад на сохранение
        $data = ['name' => 'Комп', 'products' => [
            'motherboard' => 'NS-12321',
            'ssd' => 'kingston'
        ]];
        (new OrderSaveFacade($logger))->save($data);

        return $this->renderDesignPattern(
            'Фасад',
            OrderSaveFacade::getLink(),
            OrderSaveFacade::getDescription(),
            null,
            'Результат работы шаблона в профайлере'
        );
    }

    /**
     * Адаптер (англ. adapter)
     *
     * @Route("/structural/adapter", name="structural.adapter")
     */
    public function adapter(LoggerInterface $logger): Response
    {
        $distanceCalculator = new DistanceCalculatorAdapter();
        (new AdapterJob($logger, $distanceCalculator))->run();

        return $this->renderDesignPattern(
            'Адаптер',
            AdapterJob::getLink(),
            AdapterJob::getDescription(),
            null,
            'Результат работы шаблона в профайлере'
        );
    }

    /**
     * Мост (англ. bridge)
     *
     * @Route("/structural/bridge", name="structural.bridge")
     */
    public function bridge(LoggerInterface $logger): Response
    {
        (new BridgeDemo($logger))->run();

        return $this->renderDesignPattern(
            'Мост',
            BridgeDemo::getLink(),
            BridgeDemo::getDescription(),
            null,
            'Результат работы шаблона в профайлере'
        );
    }
}
