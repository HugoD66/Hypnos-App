<?php

namespace App\Controller\Gestion;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminGestionController extends AbstractController
{
    //Mettre /{id} i touti
    #[Route('/admin-gestion', name: 'app_admin_gestion')]
    public function index(): Response
    {
        return $this->render('gestion/admin.html.twig', [
            'title' => 'Hypnos - Gestion Administrateur',
        ]);
    }
}
