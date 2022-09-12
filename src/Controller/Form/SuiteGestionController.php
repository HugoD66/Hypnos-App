<?php

namespace App\Controller\Form;

use App\Entity\Suite;
use App\Form\ManagerType;
use App\Form\SuiteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class SuiteGestionController extends AbstractController
{
    #[Route('/add-suite', name: 'app_suite_create')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          SluggerInterface $slugger): Response
    {
        $user = $this->getUser();
        $suite = new Suite();

        $form = $this->createForm(SuiteType::class, $suite);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            //Picture
            $picture = $form->get('picture')->getData();
            if ($picture) {
                $originalFilename = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $picture->guessExtension();
                try {
                    $picture->move(
                        $this->getParameter('recipe-picture'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $suite->setPicture($newFilename);
                $suite->setManager($user);

                $suite = $form->getData();
            }
            //Push
            $entityManager->persist($suite);
            $entityManager->flush();
        }
        return $this->render('form/suite-creation.html.twig', [
            'title' => 'Hypnos - Creation Suite',
            'form' => $form->createView(),

        ]);
    }
}
