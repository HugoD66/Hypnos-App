<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class PolConfController extends AbstractController
{
    #[Route('/hypnos-politique-confidentialite', name: 'app_pol')]
    public function politique( ): Response
    {
    return $this->render('polconf/pol.html.twig', [
        'title' => 'Hypnos - Pol.Confidentialité',
    ]);
    }
    #[Route('/hypnos-mentions-legales', name: 'app_mention')]
    public function mentions( ): Response
    {
        return $this->render('polconf/mention.html.twig', [
            'title' => 'Hypnos - Mentions Légales',
        ]);
    }
}