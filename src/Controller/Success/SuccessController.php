<?php

namespace App\Controller\Success;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuccessController extends AbstractController
{
    #[Route('/success-contact', name: 'app_success_contact')]
    public function succesContact(): Response
    {
        return $this->render('success/success_contact_us.html.twig', [
            'title' => 'Hypnos - Succés Envois Formulaire',
        ]);
    }

    //A voir apres init User
    #[Route('/success-register', name: 'app_success_register')]
    public function successEnregistrement(): Response
    {
        return $this->render('success/success_register.html.twig', [
            'title' => 'Hypnos - Succés Enregistrement',
        ]);
    }

    #[Route('/success-reservation', name: 'app_success_reservation')]
    public function successReservation(): Response
    {
        return $this->render('success/success_reservation.html.twig', [
            'title' => 'Succés Reservation',
        ]);
    }

    #[Route('/success-change-password', name: 'app_success_change_password')]
    public function successChangePassword(): Response
    {
        return $this->render('success/success_change_password.html.twig', [
            'title' => 'Succés Reservation',
        ]);
    }
}
