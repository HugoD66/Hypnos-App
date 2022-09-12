<?php

namespace App\Controller\Form;

use App\Entity\Manager;
use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ManagerChangePasswordController extends AbstractController
{
    #[Route('/manager/{id}/change-password', name: 'app_manager_change_password')]
    public function index(ManagerRegistry $doctrine,
                          Request $request,
                          UserPasswordHasherInterface $userPasswordHasher,
                          EntityManagerInterface $entityManager,
                          int $id): Response
    {

        $manager = $doctrine->getRepository(Manager::class)->find($id);
        $form = $this->createForm(ChangePasswordType::class, $manager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $manager->setPassword(
                $userPasswordHasher->hashPassword(
                    $manager,
                    $form->get('plainPassword')->getData()
                )
            );


            $entityManager->persist($manager);
            $entityManager->flush();

            return $this->redirectToRoute('app_success_change_password');

        }
        return $this->render('form/manager-change-password.html.twig', [
            'title' => 'Hypnos - Changement de mot de pase',
            'manager' => $manager,
            'form' => $form->createView(),
        ]);
    }
}
