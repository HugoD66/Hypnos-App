<?php

namespace App\Controller\ById;

use App\Entity\PictureList;
use App\Entity\Suite;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuiteController extends AbstractController
{
    #[Route('/suite/{id}', name: 'app_suite')]
    public function index(ManagerRegistry $doctrine, int $id): Response
    {
        $suite = $doctrine->getRepository(Suite::class)->find($id);
        $pictureList = $doctrine->getRepository(PictureList::class)->findAll();

        return $this->render('by_id/suite.html.twig', [
            'title' => 'Hypnos - Suite',
            'suite' => $suite,
            'pictureList' => $pictureList,

        ]);
    }
}
