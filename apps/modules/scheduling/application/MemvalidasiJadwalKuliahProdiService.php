<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\JadwalKuliahProdi;
use Siakad\Scheduling\Domain\Model\JadwalKuliahProdiRepository;

class MemvalidasiJadwalKuliahProdiService
{
    private $jadwalKuliahProdiRepository;

    public function __construct(JadwalKuliahProdiRepository $jadwalKuliahProdiRepository)
    {
        $this->jadwalKuliahProdiRepository = $jadwalKuliahProdiRepository;
    }

    public function execute($day)
    {
        $jadwalKuliahProdi = $this->jadwalKuliahProdiRepository->byDay($day);
        $jadwalKuliahProdi->validasi();
    }
}