<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/centre', name: 'app_centre')]
    public function centre(): Response
    {
        return $this->render('home/centre.html.twig');
    }

    #[Route('/equipe', name: 'app_equipe')]
    public function equipe(): Response
    {
        return $this->render('home/equipe.html.twig');
    }

    #[Route('/traumatologie', name: 'app_traumatologie')]
    public function traumatologie(): Response
    {
        return $this->render('home/traumatologie.html.twig');
    }


}
