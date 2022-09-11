<?php

namespace App\Controller\Liste;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeSuitesController extends AbstractController
{
    #[Route('/liste-suites', name: 'app_liste_suites')]
    public function index(): Response
    {
        return $this->render('liste/suites.html.twig', [
            'title' => 'Hypnos - Liste des suites',
        ]);
    }
}
