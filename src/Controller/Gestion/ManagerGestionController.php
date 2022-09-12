<?php

namespace App\Controller\Gestion;

use App\Entity\Manager;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManagerGestionController extends AbstractController
{
    #[Route('/manager/{id}', name: 'app_manager_gestion')]
    public function index(ManagerRegistry $doctrine,
                          int $id): Response
    {
        $manager = $doctrine->getRepository(Manager::class)->find($id);

        return $this->render('gestion/manager.html.twig', [
            'title' => 'Hypnos - Gestion Manager',
            'manager' => $manager,
        ]);
    }
}
