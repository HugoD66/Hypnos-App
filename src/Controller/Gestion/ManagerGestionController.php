<?php

namespace App\Controller\Gestion;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManagerGestionController extends AbstractController
{
    //Mettre /{id} i touti
    #[Route('/manager', name: 'app_manager_gestion')]
    public function index(): Response
    {
        return $this->render('gestion/manager.html.twig', [
            'title' => 'Hypnos - Gestion Manager',
        ]);
    }
}
