<?php

namespace App\Controller\Success;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RedirectController extends AbstractController
{
    #[Route('/redirect-booking', name: 'app_redirect_booking')]
    public function index(): Response
    {
        return $this->render('redirect/redirect_booking.html.twig', [
            'title' => 'Hypnos - Redirection',
        ]);
    }
}
