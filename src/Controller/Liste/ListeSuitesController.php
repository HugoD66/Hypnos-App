<?php

namespace App\Controller\Liste;

use App\Data\SearchData;
use App\Entity\Hotel;
use App\Entity\Suite;
use App\Form\SearchForm;
use App\Repository\SuiteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeSuitesController extends AbstractController
{
    #[Route('/liste-suites', name: 'app_liste_suites')]
    public function index(ManagerRegistry $doctrine, SuiteRepository $repository, Request $request): Response
    {
        $suites = $doctrine->getRepository(Suite::class)->findAll();


        return $this->render('liste/suites.html.twig', [
            'title' => 'Hypnos - Liste des suites',
            'suites' => $suites,

        ]);
    }
}
