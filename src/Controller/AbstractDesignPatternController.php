<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\DesignPatternExample;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractDesignPatternController extends AbstractController
{
    /**
     * Идентификатор контроллера для View
     */
    protected string $menuId = '';

    /**
     * @param string $name
     * @param string $link
     * @param string[] $description
     * @param object|array|null $realisation
     * @param string|null $note
     * @param DesignPatternExample|null $example
     * @return Response
     */
    protected function renderDesignPattern(
        string $name,
        string $link,
        array $description,
        $realisation = null,
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
            'example' => $example,
            'menu_id' => $this->menuId
        ]);
    }
}
