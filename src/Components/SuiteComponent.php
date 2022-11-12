<?php

namespace  App\Components;

use App\Entity\Suite;
use App\Repository\SuiteRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;


#[AsTwigComponent('suite')]
class SuiteComponent
{
    public int $id;
    public function __construct(
        private SuiteRepository $suiteRepository
    ) {

    }
    public function getSuite (): Suite
    {
        return $this->suiteRepository->find($this->id);
    }
}