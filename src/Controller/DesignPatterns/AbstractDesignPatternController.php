<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns;

use App\Entity\DesignPatternExample;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractDesignPatternController extends AbstractController
{
    /**
     * @param string $name
     * @param string $link
     * @param string[] $description
     * @param object|null $realisation
     * @param string|null $note
     * @param DesignPatternExample|null $example
     * @return Response
     */
    protected function renderDesignPattern(
        string $name,
        string $link,
        array $description,
        ?object $realisation = null,
        ?string $note = null,
        ?DesignPatternExample $example = null
    ): Response
    {
        return $this->render('pattern/showPattern.html.twig', [
            'name' => $name,
            'link' => $link,
            'description' => $description,
            'realisation' => $realisation,
            'note' => $note,
            'example' => $example
        ]);
    }
}
