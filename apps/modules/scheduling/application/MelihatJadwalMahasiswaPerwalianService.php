<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\JadwalKelasRepository;

class MelihatJadwalMahasiswaPerwalianService
{
    private $jadwalKelasRepository;

    public function __construct(JadwalKelasRepository $jadwalKelasRepository)
    {
        $this->jadwalKelasRepository = $jadwalKelasRepository;
    }

    public function execute(MelihatJadwalMahasiswaPerwalianRequest $request) {
        $jadwalKelas = $this->jadwalKelasRepository->byMahasiswa($request->nrpMahasiswa);
        return new MelihatJadwalKuliahProdiResponse($jadwalKelas);
    }
}