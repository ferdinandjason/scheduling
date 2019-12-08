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

        try {
            $jadwalKelas = $this->jadwalKelasRepository->byMahasiswa($request->nrpMahasiswa);
        } catch (JadwalKelasNotFoundException $exception) {
            $message = $exception->getMessage();
        }

        return new MelihatJadwalKuliahProdiResponse($jadwalKelas, $message);
    }
}