<?php

namespace App\Controller\Form;

use App\Entity\ContactUs;
use App\Form\ContactUsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactUsController extends AbstractController
{
    #[Route('/contact-us', name: 'app_contact_us')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,): Response
    {
        $contactus = new ContactUs();

        $form = $this->createForm(ContactUsType::class, $contactus);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

    //Push
            $suite = $form->getData();
            $entityManager->persist($suite);
            $entityManager->flush();
        }
        return $this->render('form/contact_us.html.twig', [
            'title' => 'Hypnos - Nous Contacter',
            'form' => $form->createView(),
        ]);
    }
}
