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
        $jadwalKuliahByDay = $this->jadwalKelasRepository->byDay($request->day);

        return new MengelolaJadwalKuliahResponse($jadwalKuliahByDay);
    }

    public function delete($id)
    {
        $this->jadwalKelasRepository->delete($id);
    }
}