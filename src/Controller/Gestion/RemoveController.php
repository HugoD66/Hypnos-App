<?php

namespace App\Controller\Gestion;

use App\Entity\Hotel;
use App\Entity\Manager;
use App\Entity\PictureList;
use App\Entity\Suite;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RemoveController extends AbstractController
{
    #[Route('/remove/suite/{id}', name: 'app_manager_gestion_remove_suite')]
    public function removeSuite(ManagerRegistry $doctrine,
                                      int $id,
                                      EntityManagerInterface $entityManager) : Response
    {
        $suite = $doctrine->getRepository(Suite::class)->find($id);
        $entityManager->remove($suite);
        $entityManager->flush();
        return $this->redirectToRoute('app_home');
    }

    #[Route('/remove/picture-list/{id}', name: 'app_manager_gestion_remove_pictureList')]
    public function removePictureList(ManagerRegistry $doctrine,
                                      int $id,
                                      EntityManagerInterface $entityManager) : Response
    {
        $pictureListRemove = $doctrine->getRepository(PictureList::class)->find($id);
        $entityManager->remove($pictureListRemove);
        $entityManager->flush();
        return $this->redirectToRoute('app_home');
    }
    #[Route('/remove/manager/{id}', name: 'app_admin_gestion_remove_manager')]
    public function removeManager(ManagerRegistry $doctrine,
                                      int $id,
                                      EntityManagerInterface $entityManager) : Response
    {
        $manager = $doctrine->getRepository(Manager::class)->find($id);
        $entityManager->remove($manager);
        $entityManager->flush();
        return $this->redirectToRoute('app_home');
    }
    #[Route('/remove/hotel/{id}', name: 'app_admin_gestion_hotel_remove')]
    public function removeHotel(ManagerRegistry $doctrine,
                                      int $id,
                                      EntityManagerInterface $entityManager) : Response
    {
        $hotel = $doctrine->getRepository(Hotel::class)->find($id);
        $entityManager->remove($hotel);
        $entityManager->flush();
        return $this->redirectToRoute('app_home');
    }


}
