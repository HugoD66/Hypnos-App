<?php

namespace App\Controller\Form;

use App\Entity\Manager;
use App\Form\ManagerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ManagerController extends AbstractController
{
    #[Route('/add-manager', name: 'app_manager_create')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          UserPasswordHasherInterface $managerPasswordHasher): Response
    {

        $manager = new Manager();

        $form = $this->createForm(ManagerType::class, $manager);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        // Hashage mdp
            $manager->setPassword(
                $managerPasswordHasher->hashPassword(
                    $manager,
                    $form->get('password')->getData()
                )
            );
            $manager->setRoles(array('ROLE_MANAGER'));
            $manager = $form->getData();
        //Push

            $entityManager->persist($manager);
            $entityManager->flush();
            return $this->redirectToRoute('app_success_add_manager');

        }
        return $this->render('form/manager-creation.html.twig', [
            'title' => 'Hypnos - Creation Manager',
            'form' => $form->createView(),

        ]);
    }
}
