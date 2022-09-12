<?php

namespace App\Controller\Gestion;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserGestionController extends AbstractController
{
    #[Route('/user/{id}', name: 'app_user_gestion')]
    public function index(ManagerRegistry $doctrine,int $id): Response
    {
        $user = $doctrine->getRepository(User::class)->find($id);

        return $this->render('gestion/user.html.twig', [
            'title' => 'Hypnos - Gestion Utilisateur',
            'user' => $user,
        ]);
    }
}
