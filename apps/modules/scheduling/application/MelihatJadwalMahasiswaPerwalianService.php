<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\JadwalKelasRepository;
use Siakad\Scheduling\Exception\JadwalKelasNotFoundException;

class MelihatJadwalMahasiswaPerwalianService
{
    private $jadwalKelasRepository;

    public function __construct(JadwalKelasRepository $jadwalKelasRepository)
    {
        $this->jadwalKelasRepository = $jadwalKelasRepository;
    }

    public function execute(MelihatJadwalMahasiswaPerwalianRequest $request) {
        $message = null;
        $jadwalKelas = null;

        $jadwalKelas = $this->jadwalKelasRepository->byMahasiswa($request->nrpMahasiswa);
        if (!$jadwalKelas) {
            throw new ApplicationException("Mahasiswa with NRP = {$request->nrpMahasiswa} not found");
        }

        return new MelihatJadwalKuliahProdiResponse($jadwalKelas, $message);
    }
}