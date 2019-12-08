<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\JadwalKelasRepository;
use Siakad\Scheduling\Exception\JadwalKelasNotFoundException;

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
        $message = null;

        try {
            if($request->hasParameters()) {
                $jadwalKuliahByDay = $this->jadwalKelasRepository->byDay(
                    $request->day
                );
            } else {
                $jadwalKuliahByDay = $this->jadwalKelasRepository->all();
            }
        } catch (JadwalKelasNotFoundException $exception) {
            $message = $exception->getMessage();
        }

        return new MengelolaJadwalKuliahResponse($jadwalKuliahByDay, $message);
    }
}