<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\KelasRepository;

class MelihatKelasService
{
    private $kelasRepository;

    public function __construct(KelasRepository $kelasRepository)
    {
        $this->kelasRepository = $kelasRepository;
    }

    public function execute()
    {
        return new MelihatKelasResponse($this->kelasRepository->all());
    }
}