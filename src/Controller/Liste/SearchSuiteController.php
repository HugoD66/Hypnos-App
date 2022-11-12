<?php

namespace App\Controller\Liste;

use App\Entity\Suite;
use App\Repository\SuiteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchSuiteController extends AbstractController
{
    #[Route('/all-suites', name: 'all_suites')]
    public function index(ManagerRegistry $doctrine, SuiteRepository $repository, Request $request): Response
    {
        $suites = $doctrine->getRepository(Suite::class)->findAll();

        return $this->render('suitetest/index.html.twig', [
            'title' => 'Hypnos - Toutes nos suite',
            'suites' => $suites,

        ]);
    }

    #[Route('/search-suite', name: 'app_search_suites')]
    public function search(): Response
    {

        return $this->render('liste/search_suite.html.twig', [
            'title' => 'Hypnos - Recherche de suite',

        ]);
    }
}
