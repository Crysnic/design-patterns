<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('homepage/index.html.twig', [
            'name' => 'Шаблоны проектирования',
            'description' => 'Комбинация базовых приемов языка, для решения типовых задач.'
        ]);
    }
}
