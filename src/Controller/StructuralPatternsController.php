<?php

declare(strict_types=1);

namespace App\Controller;

use App\DesignPatterns\Structural\Adapter\AdapterJob;
use App\DesignPatterns\Structural\Adapter\DistanceCalculatorAdapter;
use App\DesignPatterns\Structural\Bridge\BridgeDemo;
use App\DesignPatterns\Structural\Composite\OrderPriceComposite;
use App\DesignPatterns\Structural\Decorator\DecoratorDemo;
use App\DesignPatterns\Structural\DTO\DtoDemo;
use App\DesignPatterns\Structural\Facade\OrderSaveFacade;
use App\DesignPatterns\Structural\Proxy\GetProductTask;
use App\DesignPatterns\Structural\Proxy\Interfaces\ProductRepositoryInterface;
use App\Util\ConfigProcessorInterface;
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

    /**
     * Компоновщик (англ. composite)
     *
     * @Route("/structural/composite", name="structural.composite")
     */
    public function composite(LoggerInterface $logger): Response
    {
        (new OrderPriceComposite($logger))->run();

        return $this->renderDesignPattern(
            'Компоновщик',
            OrderPriceComposite::getLink(),
            OrderPriceComposite::getDescription(),
            null,
            'Результат работы шаблона в профайлере'
        );
    }

    /**
     * Декоратор (англ. decorator)
     *
     * @Route("/structural/decorator", name="structural.decorator")
     */
    public function decorator(LoggerInterface $logger, ConfigProcessorInterface $configProcessor): Response
    {
        (new DecoratorDemo($logger, $configProcessor))->run();

        return $this->renderDesignPattern(
            'Декоратор',
            DecoratorDemo::getLink(),
            DecoratorDemo::getDescription(),
            null,
            'Результат работы шаблона в профайлере'
        );
    }

    /**
     * DTO
     *
     * @Route("/structural/dto", name="structural.dto")
     */
    public function dto(): Response
    {
        $dto = (new DtoDemo())->run();

        return $this->renderDesignPattern(
            'DTO',
            DtoDemo::getLink(),
            DtoDemo::getDescription(),
            $dto
        );
    }

    /**
     * Заместитель (англ. proxy)
     * В настройках проекта указали для ProductRepositoryInterface использовать proxy
     * вместо базового репозитория
     *
     * @Route("/structural/proxy", name="structural.proxy")
     */
    public function proxy(LoggerInterface $logger, ProductRepositoryInterface $productRepository): Response
    {
        $product = (new GetProductTask($productRepository))->run(1);
        $logger->info($product);

        return $this->renderDesignPattern(
            'Заместитель',
            GetProductTask::getLink(),
            GetProductTask::getDescription(),
            null,
            'Результат работы шаблона в профайлере'
        );
    }
}
