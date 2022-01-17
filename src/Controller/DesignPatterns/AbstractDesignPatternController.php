<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractDesignPatternController extends AbstractController
{
    /**
     * @param string $name
     * @param string $link
     * @param string[] $description
     * @param object $realisation
     * @return Response
     */
    protected function renderDesignPattern(
        string $name,
        string $link,
        array $description,
        object $realisation
    ): Response
    {
        return $this->render('pattern/showPattern.html.twig', [
            'name' => $name,
            'link' => $link,
            'description' => $description,
            'realisation' => $realisation
        ]);
    }
}
