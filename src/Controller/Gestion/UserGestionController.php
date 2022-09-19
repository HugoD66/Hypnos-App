<?php

namespace App\Controller\Gestion;

use App\Entity\Booking;
use App\Entity\Suite;
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
        $suite = $doctrine->getRepository(Suite::class)->findAll();
        $booking = $doctrine->getRepository(Booking::class)->findAll();
        $utilisateur = $doctrine->getRepository(User::class)->find($id);

        return $this->render('gestion/user.html.twig', [
            'title' => 'Hypnos - Gestion Utilisateur',
            'utilisateur' => $utilisateur,
            'booking' => $booking,
            'suite' => $suite,
        ]);
    }
    #[Route('/user/remove-booking/{id}', name: 'delete_form_booking')]
    public function removeBooking(ManagerRegistry $doctrine,
                                    int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $booking = $entityManager->getRepository(Booking::class)->findOneBy(['id' => $id]);
        $entityManager->remove($booking);
        $entityManager->flush();

        return $this->redirectToRoute('app_annul_voyage', [
            'booking' => $booking,
        ]);
    }

}
