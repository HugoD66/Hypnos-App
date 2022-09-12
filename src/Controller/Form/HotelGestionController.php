<?php

namespace App\Controller\Form;

use App\Entity\Hotel;
use App\Form\HotelType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class HotelGestionController extends AbstractController
{
    #[Route('/add-hotel', name: 'app_hotel_create')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          SluggerInterface $slugger): Response
    {
        $user = $this->getUser();
        $hotel = new Hotel();

        $form = $this->createForm(HotelType::class, $hotel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
    //Picture
            $picture = $form->get('image')->getData();
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
                $hotel->setImage($newFilename);
                $hotel->setGerantAdmin($user);
                $hotel = $form->getData();
            }
            //Push
            $entityManager->persist($hotel);
            $entityManager->flush();
        }

        return $this->render('form/hotel-creation.html.twig', [
            'title' => 'Hypnos - Creation Hotel',
            'form' => $form->createView(),
            ]);
    }
}
