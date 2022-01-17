<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Fundamental;

use App\Controller\DesignPatterns\AbstractDesignPatternController;
use App\Controller\DesignPatterns\Fundamental\PropertyContainer\BlogPost;
use App\Controller\DesignPatterns\Fundamental\PropertyContainer\PropertyContainer;
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
}
