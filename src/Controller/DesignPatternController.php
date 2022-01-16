<?php

namespace App\Controller;

use App\DesignPatterns\Fundamental\PropertyContainer\BlogPost;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DesignPatternController extends AbstractController
{
    /**
     * @Route("/test", name="pattern.show")
     */
    public function index(): Response
    {
        $item = new BlogPost();
        $item->setTitle('Заголовок статьи');
        $item->setCategoryId(10);

        return $this->render('pattern/showPattern.html.twig', [
            'post' => $item
        ]);
    }
}