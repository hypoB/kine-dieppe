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

    #[Route('/traumatologie', name: 'app_traumatologie')]
    public function traumatologie(): Response
    {
        return $this->render('soins/traumatologie.html.twig');
    }

    #[Route('/kinesitherapie-du-sport', name: 'app_kine_du_sport')]
    public function kinesitherapieDuSport(): Response
    {
        return $this->render('soins/kinesitherapie-du-sport.html.twig');
    }

    #[Route('/rehabilitation-cardio-respiratoire', name: 'app_rehabilitation_cardio_respiratoire')]
    public function rehabilitationCardioRespiratoire(): Response
    {
        return $this->render('soins/rehabilitation-cardio-respiratoire.html.twig');
    }

    #[Route('/rhumatologie', name: 'app_rhumatologie')]
    public function rhumatologie(): Response
    {
        return $this->render('soins/rhumatologie.html.twig');
    }

    #[Route('/geriatrie', name: 'app_geriatrie')]
    public function geriatrie(): Response
    {
        return $this->render('soins/geriatrie.html.twig');
    }

    #[Route('/neurologie', name: 'app_neurologie')]
    public function neurologie(): Response
    {
        return $this->render('soins/neurologie.html.twig');
    }
}
