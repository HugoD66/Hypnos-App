<?php

namespace App\Controller\ById;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuiteController extends AbstractController
{
    //Mettre /{id} i touti
    #[Route('/suite', name: 'app_suite')]
    public function index(): Response
    {
        return $this->render('by_id/suite.html.twig', [
            'title' => 'TITRE SUITE ID  Hypnos - ',
        ]);
    }
}
