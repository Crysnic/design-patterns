<?php

declare(strict_types=1);

namespace App\Controller;

use App\Middleware\Structural\Facade\OrderSaveFacade;
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
            OrderSaveFacade::getDescription()
        );
    }
}
