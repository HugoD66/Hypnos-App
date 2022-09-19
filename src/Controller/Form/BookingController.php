<?php

namespace App\Controller\Form;

use App\Entity\Booking;
use App\Entity\Hotel;
use App\Entity\Suite;
use App\Form\BookingFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    #[Route('/booking', name: 'app_booking')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();

        $booking = new Booking();
//Form
        $form = $this->createForm(BookingFormType::class, $booking);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $datetime = new \DateTimeImmutable();


            $booking->setDidAt($datetime);
            $booking->setClient($user);
            $booking->setIsActive(true);
//Verification dispo
            $start_date = $request->request->get('start_date');
            $end_date = $request->request->get('start_end');
            $isPossibleBooking = $entityManager->getRepository(Booking::class)->isPossible($start_date->getStartDate(),
                $end_date->getDateEnd());


//Push
                if($isPossibleBooking) {
                    $booking = $form->getData();

                    $entityManager->persist($booking);
                    $entityManager->flush();

                    return $this->redirectToRoute('app_success_reservation');
               } else {
                    $this->addFlash('error', 'La suite choisie n\'est pas disponible à ces dates. ');
                    unset($newBooking);
                }

            }

        return $this->render('form/booking.html.twig', [
            'title' => 'BookingController',
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
}
