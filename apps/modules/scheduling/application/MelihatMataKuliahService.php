<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\MataKuliahRepository;

class MelihatMataKuliahService
{
    private $mataKuliahRepository;

    public function __construct(
        MataKuliahRepository $mataKuliahRepository
    )
    {
        $this->mataKuliahRepository = $mataKuliahRepository;
    }

    public function execute()
    {
        return new MelihatMataKuliahResponse($this->mataKuliahRepository->all());
    }
}