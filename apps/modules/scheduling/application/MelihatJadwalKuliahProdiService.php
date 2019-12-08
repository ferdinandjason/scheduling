<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\JadwalKelasRepository;
use Siakad\Scheduling\Exception\JadwalKelasNotFoundException;

class MelihatJadwalKuliahProdiService
{
    private $jadwalKelasRepository;

    public function __construct(JadwalKelasRepository $jadwalKelasRepository)
    {
        $this->jadwalKelasRepository = $jadwalKelasRepository;
    }

    public function execute(MelihatJadwalKuliahProdiRequest $request)
    {
        $jadwalKuliahByPeriodeKuliah = null;
        $message = null;

        try {
            if($request->hasParameters()) {
                $jadwalKuliahByPeriodeKuliah = $this->jadwalKelasRepository->byPeriodeKuliah(
                    $request->periodeKuliahTipe,
                    $request->periodeKuliahTahun
                );
            } else {
                $jadwalKuliahByPeriodeKuliah = $this->jadwalKelasRepository->all();
            }
        } catch (JadwalKelasNotFoundException $exception) {
            $message = $exception->getMessage();
        }

        return new MelihatJadwalKuliahProdiResponse($jadwalKuliahByPeriodeKuliah, $message);
    }
}