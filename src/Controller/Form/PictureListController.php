<?php

namespace App\Controller\Form;

use App\Entity\PictureList;
use App\Form\PictureListType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class PictureListController extends AbstractController
{
    #[Route('/add-picture-list', name: 'app_picture_list')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          SluggerInterface $slugger): Response
    {
        $pictureList = new PictureList();
        $form = $this->createForm(PictureListType::class, $pictureList);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
    //Picture 1
            $pictureOne = $form->get('pic_one')->getData();
            if ($pictureOne) {
                $originalFilename = pathinfo($pictureOne->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $pictureOne->guessExtension();
                try {
                    $pictureOne->move(
                        $this->getParameter('recipe-picture'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $pictureList->setPicOne($newFilename);
            }
    //Picture 2
            $pictureTwo = $form->get('pic_two')->getData();
            if ($pictureTwo) {
                $originalFilename = pathinfo($pictureTwo->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $pictureTwo->guessExtension();
                try {
                    $pictureTwo->move(
                        $this->getParameter('recipe-picture'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $pictureList->setPicTwo($newFilename);
            }
    //Picture 3
            $pictureThree = $form->get('pic_three')->getData();
            if ($pictureThree) {
                $originalFilename = pathinfo($pictureThree->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $pictureThree->guessExtension();
                try {
                    $pictureThree->move(
                        $this->getParameter('recipe-picture'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $pictureList->setPicThree($newFilename);
            }
    //Persist
            $pictureList = $form->getData();
            $entityManager->persist($pictureList);
            $entityManager->flush();
        }
            return $this->render('form/picturelist-creation.html.twig', [
                'title' => 'Hypnos - Ajout D\'image à une suite',
                'form' => $form->createView(),
            ]);
    }
}
