<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\JadwalKuliahProdiRepository;

class MelihatJadwalKuliahService
{
    private $jadwalKuliahProdiRepository;

    public function __construct(
        JadwalKuliahProdiRepository $jadwalKuliahProdiRepository
    )
    {
        $this->jadwalKuliahProdiRepository = $jadwalKuliahProdiRepository;
    }

    public function execute(MelihatJadwalKuliahRequest $request)
    {
        return new MelihatJadwalKuliahResponse($this->jadwalKuliahProdiRepository->byDay($request->day));
    }
}