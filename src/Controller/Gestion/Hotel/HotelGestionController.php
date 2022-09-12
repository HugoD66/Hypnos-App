<?php

namespace App\Controller\Gestion\Hotel;

use App\Entity\Hotel;
use App\Form\HotelType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HotelGestionController extends AbstractController
{
    #[Route('/hotel-create', name: 'app_hotel_create')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager): Response
    {
        $hotel = new Hotel();
        $form = $this->createForm(HotelType::class, $hotel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hotel = $form->getData();
            $entityManager->persist($hotel);
            $entityManager->flush();
        }

        return $this->render('gestion/hotel/hotel.html.twig', [
            'title' => 'Hypnos - Creation Hotel',
            'form' => $form->createView(),
            ]);
    }
}
