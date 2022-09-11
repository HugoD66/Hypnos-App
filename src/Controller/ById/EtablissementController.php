<?php

namespace App\Controller\ById;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtablissementController extends AbstractController
{
    //Mettre /{id} i touti
    #[Route('/etablissement', name: 'app_etablissement')]
    public function index(): Response
    {
        return $this->render('by_id/etablissement.html.twig', [
            'title' => 'TITRE SUITE ID  Hypnos - ',
        ]);
    }
}
