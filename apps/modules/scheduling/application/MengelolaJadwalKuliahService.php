<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\DosenRepository;
use Siakad\Scheduling\Domain\Model\JadwalKelas;
use Siakad\Scheduling\Domain\Model\JadwalKuliahProdiRepository;
use Siakad\Scheduling\Domain\Model\PrasaranaRepository;
use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;
use Siakad\Scheduling\Domain\Model\KelasRepository;

class MengelolaJadwalKuliahService
{
    private $jadwalKuliahProdiRepository;
    private $prasaranaRepository;
    private $periodeKuliahRepository;
    private $kelasRepository;
    private $dosenRepository;

    public function __construct(
        JadwalKuliahProdiRepository $jadwalKuliahProdiRepository,
        PrasaranaRepository $prasaranaRepository, 
        PeriodeKuliahRepository $periodeKuliahRepository,
        KelasRepository $kelasRepository,
        DosenRepository $dosenRepository
    )
    {
        $this->jadwalKuliahProdiRepository = $jadwalKuliahProdiRepository;
        $this->prasaranaRepository = $prasaranaRepository;
        $this->periodeKuliahRepository = $periodeKuliahRepository;
        $this->kelasRepository = $kelasRepository;
        $this->dosenRepository = $dosenRepository;
    }

    public function execute(MengelolaJadwalKuliahRequest $request)
    {
        $jadwalKuliah = null;
        $message = null;
        $service = new MelihatPrasaranaService($this->prasaranaRepository);
        $prasarana = $service->execute()->data;

        $service = new MelihatPeriodeKuliahService($this->periodeKuliahRepository);
        $periodeKuliah = $service->execute(new MelihatPeriodeKuliahRequest())->data;

        $jadwalKuliahProdi = $this->jadwalKuliahProdiRepository->byDay($request->day);

        if($request->hasId()){

            return new MengelolaJadwalKuliahResponse($jadwalKuliah, $periodeKuliah, $prasarana, $jadwalById, $message);
        }

        return new MengelolaJadwalKuliahResponse($jadwalKuliah, $periodeKuliah, $prasarana, null, $message);
    }

    public function delete($id)
    {
        $this->jadwalKelasRepository->delete($id);
    }

    public function isAvailable($id, $idPeriodeKuliah, $idPrasarana, $day)
    {
        $response = $this->jadwalKelasRepository->countByPeriodePrasaranaHari(
            $idPeriodeKuliah,
            $idPrasarana,
            $day   
        );

        return !$response['count'] || ($response['count'] == '1' && $response['id'] == $id);
    }

    public function saveJadwalKuliahService(MengelolaJadwalKuliahRequest $request)
    {
        $jadwalKuliah = $this->jadwalKuliahProdiRepository->byDay($request->day);

        $kelas = $this->kelasRepository->byId($request->idKelas);
        $periodeKuliah = $this->periodeKuliahRepository->byId($request->idPeriodeKuliah);
        $prasarana = $this->prasaranaRepository->byId($request->idPrasarana);
        $dosen = $this->dosenRepository->byIdKelas($request->idKelas);

        $newJadwalKuliah = $jadwalKuliah->addJadwalKuliahProdi(
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

    }
}