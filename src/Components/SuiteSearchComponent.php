<?php
namespace App\Components;

use App\Repository\SuiteRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('suite_search')]
class SuiteSearchComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $query = '';

    public function __construct(
        private SuiteRepository $suiteRepository
    ) {
    }

    public function getSuites(): array
    {
        return $this->suiteRepository->findByQuery($this->query);
    }
    public function getAllSuites (): array
    {
        return $this->suiteRepository->findAll();
    }
}