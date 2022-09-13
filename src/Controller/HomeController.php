<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $hotel = $doctrine->getRepository(Hotel::class)->findAll();


        $user = $this->getUser();
        return $this->render('accueil.html.twig', [
            'title' => 'Hypnos - Accueil',
            'user' => $user,
            'hotel' => $hotel,
        ]);
    }
}
