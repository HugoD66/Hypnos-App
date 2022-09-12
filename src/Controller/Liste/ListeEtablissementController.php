<?php

namespace App\Controller\Liste;

use App\Entity\Hotel;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeEtablissementController extends AbstractController
{
    #[Route('/liste-etablissements', name: 'app_liste_etablissement')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $hotel = $doctrine->getRepository(Hotel::class)->findAll();

        return $this->render('liste/etablissements.html.twig', [
            'title' => 'Hypnos - Liste des établissements',
            'hotel' => $hotel,

        ]);
    }
}
