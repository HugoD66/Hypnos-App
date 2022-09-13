<?php

namespace App\Controller\ById;

use App\Entity\Hotel;
use App\Entity\PictureList;
use App\Entity\Suite;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtablissementController extends AbstractController
{
    #[Route('/etablissement/{id}', name: 'app_etablissement')]
    public function index(ManagerRegistry $doctrine, int $id): Response
    {
        $hotel = $doctrine->getRepository(Hotel::class)->find($id);
        $suite = $doctrine->getRepository(Suite::class)->findAll();
        $pictureList = $doctrine->getRepository(PictureList::class)->findAll();

        return $this->render('by_id/etablissement.html.twig', [
            'title' => 'Hypnos - Hotel' ,
            'hotel' => $hotel,
            'suite' => $suite,
            'pictureList' => $pictureList,
        ]);
    }
}
