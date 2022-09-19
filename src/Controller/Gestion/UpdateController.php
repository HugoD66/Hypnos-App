<?php

namespace App\Controller\Gestion;

use App\Entity\Booking;
use App\Entity\ContactUs;
use App\Entity\Hotel;
use App\Entity\Manager;
use App\Entity\PictureList;
use App\Entity\Suite;
use App\Form\ManagerType;
use App\Form\PictureListType;
use App\Form\UpdateBookingType;
use App\Form\UpdateHotelType;
use App\Form\UpdateManagerType;
use App\Form\UpdatePictureListType;
use App\Form\UpdateSuiteType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class UpdateController extends AbstractController
{
    #[Route('/update/suite/{id}', name: 'app_update_suite')]
    public function updateSuite(ManagerRegistry $doctrine,
                                int $id,
                                EntityManagerInterface $entityManager,
                                Request $request,
                                SluggerInterface $slugger) : Response
    {
        $user = $this->getUser();
        $entityManager = $doctrine->getManager();
        $suite = $doctrine->getRepository(Suite::class)->find($id);
        $hotel = $entityManager->getRepository(Hotel::class)->findOneBy(['id' => $suite]);


        $form = $this->createForm(UpdateSuiteType::class, $suite);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
                $suite->setManager($user);
                $suite = $form->getData();
//Push
            $entityManager->persist($suite);
            $entityManager->flush();

            return $this->redirectToRoute('app_success_update_suite');

        }
        return $this->render('update/update_suite.html.twig', [
            'title' => 'Hypnos - Modification Suite',
            'form' => $form->createView(),
        ]);
    }
    #[Route('/update/picture-list/{id}', name: 'app_update_picture_list')]
    public function updatePictureList(ManagerRegistry $doctrine,
                                      int $id,
                                      EntityManagerInterface $entityManager,
                                      Request $request,
                                      SluggerInterface $slugger) : Response
    {
        $user = $this->getUser();
        $entityManager = $doctrine->getManager();
        $pictureList = $doctrine->getRepository(PictureList::class)->find($id);

        $form = $this->createForm(UpdatePictureListType::class, $pictureList);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

                $pictureList = $form->getData();

            $entityManager->persist($pictureList);
            $entityManager->flush();
            return $this->redirectToRoute('app_success_update_picture_list');

        }
        return $this->render('update/update_picture_list.html.twig', [
            'title' => 'Hypnos - Ajout D\'image à une suite',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/update/manager/{id}', name: 'app_update_manager')]
    public function updateManager(ManagerRegistry $doctrine,
                                int $id,
                                EntityManagerInterface $entityManager,
                                Request $request,
                                SluggerInterface $slugger) : Response
    {
        $user = $this->getUser();
        $entityManager = $doctrine->getManager();
        $manager = $doctrine->getRepository(Manager::class)->find($id);
        $form = $this->createForm(UpdateManagerType::class, $manager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->setRoles(array('ROLE_MANAGER'));
            $manager = $form->getData();
//Push
            $entityManager->persist($manager);
            $entityManager->flush();
            return $this->redirectToRoute('app_success_update_manager');

        }
        return $this->render('update/update_manager.html.twig', [
            'title' => 'Hypnos - Modification Manager',
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
    #[Route('/update/hotel/{id}', name: 'app_update_hotel')]
    public function updateHotel(ManagerRegistry $doctrine,
                                  int $id,
                                  EntityManagerInterface $entityManager,
                                  Request $request,
                                  SluggerInterface $slugger) : Response
    {
        $user = $this->getUser();
        $entityManager = $doctrine->getManager();
        $hotel = $doctrine->getRepository(Hotel::class)->find($id);
        $form = $this->createForm(UpdateHotelType::class, $hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $pictureHotel = $hotel->getImage('image');
            $picture = $hotel->setImage($pictureHotel);
            $hotel = $form->getData();
//Push
            $entityManager->persist($hotel);
            $entityManager->flush();

        return $this->redirectToRoute('app_success_update_hotel');

        }
        return $this->render('update/update_hotel.html.twig', [
            'title' => 'Hypnos - Modification d\'un hotel',
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

// Update BOOKING

    #[Route('/user/update-booking/{id}', name: 'app_update_booking')]
    public function updateBooking(ManagerRegistry $doctrine,
                                int $id,
                                EntityManagerInterface $entityManager,
                                Request $request,
                                SluggerInterface $slugger) : Response
    {
        $user = $this->getUser();

        $entityManager = $doctrine->getManager();


        $booking = $doctrine->getRepository(Booking::class)->find($id);

        $form = $this->createForm(UpdateBookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $booking = $form->getData();
//Push
            $entityManager->persist($booking);
            $entityManager->flush();

            return $this->redirectToRoute('app_success_update_booking');

        }
        return $this->render('update/update_booking.html.twig', [
            'title' => 'Hypnos - Modification d\'un hotel',
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
}

