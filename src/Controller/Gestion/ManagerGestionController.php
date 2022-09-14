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

class ManagerGestionController extends AbstractController
{
    #[Route('/manager/{id}', name: 'app_manager_gestion')]
    public function index(ManagerRegistry $doctrine,
                          int $id): Response
    {
        $manager = $doctrine->getRepository(Manager::class)->find($id);
        $hotel = $doctrine->getRepository(Hotel::class)->findOneBy(['manager' => $manager]);

        $suite = $doctrine->getRepository(Suite::class)->findAll();
        $pictureList = $doctrine->getRepository(PictureList::class)->findAll();

        $suiteById = $doctrine->getRepository(Suite::class)->findOneBy(['manager' => $manager]);
        $pictureListById = $doctrine->getRepository(PictureList::class)->findBy(['suite' => $suiteById]);
        return $this->render('gestion/manager.html.twig', [
            'title' => 'Hypnos - Gestion Manager',
            'manager' => $manager,
            'hotel' => $hotel,
            'suite' => $suite,
            'pictureList' => $pictureList,
            'pictureListById' => $pictureListById,
        ]);
    }
}
