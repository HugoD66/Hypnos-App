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
            'title' => 'Hypnos - Succés Envoi Formulaire',
        ]);
    }
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
        $user = $this->getUser();
        return $this->render('success/success_reservation.html.twig', [
            'title' => 'Hypnos - Succés Reservation',
            'user' => $user,
        ]);
    }
    #[Route('/success-change-password', name: 'app_success_change_password')]
    public function successChangePassword(): Response
    {
        return $this->render('success/success_change_password.html.twig', [
            'title' => 'Hypnos - Succés Reservation',
        ]);
    }
    #[Route('/add-suite-success', name: 'app_success_add_suite')]
    public function successAddSuite(): Response
    {
        return $this->render('success/success_add_suite.html.twig', [
            'title' => 'Hypnos - Succés Ajout Suite',
        ]);
    }
    #[Route('/add-suite-manager', name: 'app_success_add_manager')]
    public function successAddManager(): Response
    {
        return $this->render('success/success_add_manager.html.twig', [
            'title' => 'Hypnos - Succés Ajout Manager',
        ]);
    }
}
