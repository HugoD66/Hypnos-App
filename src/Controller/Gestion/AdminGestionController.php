<?php

namespace App\Controller\Gestion;

use App\Entity\ContactUs;
use App\Entity\Hotel;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminGestionController extends AbstractController
{
    #[Route('/admin/{id}', name: 'app_admin_gestion')]
    public function index(ManagerRegistry $doctrine,
                          int $id): Response
    {
        $admin = $doctrine->getRepository(User::class)->find($id);
        $contact = $doctrine->getRepository(ContactUs::class)->getContactUsList();


        $hotelList = $doctrine->getRepository(Hotel::class)->findAll();
        return $this->render('gestion/admin.html.twig', [
            'title' => 'Hypnos - Gestion Administrateur',
            'admin' => $admin,
            'hotelList' => $hotelList,
            'contact' => $contact,

        ]);
    }

    #[Route('/admin/remove-contact-us/{id}', name: 'delete_form')]
    public function remove(ManagerRegistry $doctrine,
                           int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $contact = $entityManager->getRepository(ContactUs::class)->findOneBy(['id' => $id]);
        $entityManager->remove($contact);
        $entityManager->flush();

        return $this->redirectToRoute('app_home', [
        ]);
    }
}
