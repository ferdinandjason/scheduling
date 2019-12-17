<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\JadwalKelasRepository;

class MelihatSatuJadwalKuliahService
{
    private $jadwalKelasRepository;

    public function __construct(
        JadwalKelasRepository $jadwalKelasRepository
    )
    {
        $this->jadwalKelasRepository = $jadwalKelasRepository;
    }

    public function execute(MelihatSatuJadwalKuliahRequest $request)
    {
        return new MelihatSatuJadwalKuliahResponse($this->jadwalKelasRepository->byId($request->id));
    }
}