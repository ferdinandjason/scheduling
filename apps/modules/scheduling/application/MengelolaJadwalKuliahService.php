<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\JadwalKelasRepository;

class MengelolaJadwalKuliahService
{
    private $jadwalKelasRepository;

    public function __construct(JadwalKelasRepository $jadwalKelasRepository)
    {
        $this->jadwalKelasRepository = $jadwalKelasRepository;
    }

    public function execute(MengelolaJadwalKuliahRequest $request)
    {
        $jadwalKuliahByDay = null;

        if($request->hasParameters()) {
            $jadwalKuliahByDay = $this->jadwalKelasRepository->byDay(
                $request->day
            );
        } else {
            $jadwalKuliahByDay = $this->jadwalKelasRepository->all();
        }

        return new MengelolaJadwalKuliahResponse($jadwalKuliahByDay);
    }
}