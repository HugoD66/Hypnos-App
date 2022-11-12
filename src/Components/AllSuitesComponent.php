<?php

namespace  App\Components;

use App\Entity\Suite;
use App\Repository\SuiteRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;


#[AsTwigComponent('all_suites')]
class AllSuitesComponent
{
    public int $id;
    public function __construct(
        private SuiteRepository $suiteRepository
    ) {

    }
    public function getAllSuites (): array
    {
        return $this->suiteRepository->findAll();
    }
}