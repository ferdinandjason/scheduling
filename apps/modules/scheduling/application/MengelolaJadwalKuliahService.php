<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\DosenRepository;
use Siakad\Scheduling\Domain\Model\JadwalKelas;
use Siakad\Scheduling\Domain\Model\JadwalKelasRepository;
use Siakad\Scheduling\Domain\Model\JadwalKuliahProdiRepository;
use Siakad\Scheduling\Domain\Model\PrasaranaRepository;
use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;
use Siakad\Scheduling\Domain\Model\KelasRepository;

class MengelolaJadwalKuliahService
{
    private $jadwalKelasRepository;
    private $jadwalKuliahProdiRepository;
    private $prasaranaRepository;
    private $periodeKuliahRepository;
    private $kelasRepository;
    private $dosenRepository;

    public function __construct(
        JadwalKelasRepository $jadwalKelasRepository,
        JadwalKuliahProdiRepository $jadwalKuliahProdiRepository,
        PrasaranaRepository $prasaranaRepository, 
        PeriodeKuliahRepository $periodeKuliahRepository,
        KelasRepository $kelasRepository,
        DosenRepository $dosenRepository
    )
    {
        $this->jadwalKelasRepository = $jadwalKelasRepository;
        $this->jadwalKuliahProdiRepository = $jadwalKuliahProdiRepository;
        $this->prasaranaRepository = $prasaranaRepository;
        $this->periodeKuliahRepository = $periodeKuliahRepository;
        $this->kelasRepository = $kelasRepository;
        $this->dosenRepository = $dosenRepository;
    }

    public function execute(MengelolaJadwalKuliahRequest $request)
    {
        if ($request->hasId()) {
            $this->updateJadwalKuliahService($request);
        } else {
            $this->saveJadwalKuliahService($request);
        }
    }

    public function delete($id)
    {
        $this->jadwalKelasRepository->delete($id);
    }

    public function saveJadwalKuliahService(MengelolaJadwalKuliahRequest $request)
    {
        $jadwalKuliah = $this->jadwalKuliahProdiRepository->byDay($request->day);

        $kelas = $this->kelasRepository->byId($request->idKelas);
        $periodeKuliah = $this->periodeKuliahRepository->byId($request->idPeriodeKuliah);
        $prasarana = $this->prasaranaRepository->byId($request->idPrasarana);
        $dosen = $this->dosenRepository->byIdKelas($request->idKelas);

        $newJadwalKuliah = $jadwalKuliah->addJadwalKelas(
            new JadwalKelas(
                null,
                $kelas,
                $periodeKuliah,
                $prasarana,
                $request->day,
                $dosen
            )
        );
        $this->jadwalKuliahProdiRepository->save($newJadwalKuliah);
    }

    public function updateJadwalKuliahService(MengelolaJadwalKuliahRequest $request)
    {
        $success = $this->jadwalKelasRepository->save(
            $request->id,
            $request->idKelas,
            $request->idPeriodeKuliah,
            $request->idPrasarana,
            $request->day
        );
    }
}