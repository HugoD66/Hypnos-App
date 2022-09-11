<?php

namespace App\Controller\Gestion;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserGestionController extends AbstractController
{
    //Mettre /{id} i touti
    #[Route('/user-gestion', name: 'app_user_gestion')]
    public function index(): Response
    {
        return $this->render('gestion/user.html.twig', [
            'title' => 'Hypnos - Gestion Utilisateur',
        ]);
    }
}
