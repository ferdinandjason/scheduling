<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\JadwalKelasRepository;
use Siakad\Scheduling\Domain\Model\PrasaranaRepository;
use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;
use Siakad\Scheduling\Exception\JadwalKelasNotFoundException;

class MengelolaJadwalKuliahService
{
    private $jadwalKelasRepository;
    private $prasaranaRepository;
    private $periodeKuliahRepository;

    public function __construct(
        JadwalKelasRepository $jadwalKelasRepository, 
        PrasaranaRepository $prasaranaRepository, 
        PeriodeKuliahRepository $periodeKuliahRepository
    )
    {
        $this->jadwalKelasRepository = $jadwalKelasRepository;
        $this->prasaranaRepository = $prasaranaRepository;
        $this->periodeKuliahRepository = $periodeKuliahRepository;
    }

    public function execute(MengelolaJadwalKuliahRequest $request)
    {
        $service = new MelihatPrasaranaService($this->prasaranaRepository);
        $prasarana = $service->execute()->data;

        $service = new MelihatPeriodeKuliahService($this->periodeKuliahRepository);
        $periodeKuliah = $service->execute(new MelihatPeriodeKuliahRequest())->data;

        if($request->hasId()){
            try{
                $jadwalById = $this->jadwalKelasRepository->byId($request->id);
            } catch (JadwalKelasNotFoundException $exception) {
                $message = $exception->getMessage();
            }
            $jadwalKuliah = $this->jadwalKelasRepository->all();

            return new MengelolaJadwalKuliahResponse($jadwalKuliah, $periodeKuliah, $prasarana, $jadwalById, $message);
        }

        $jadwalKuliah = $this->jadwalKelasRepository->byDay($request->day);

        return new MengelolaJadwalKuliahResponse($jadwalKuliah, $periodeKuliah, $prasarana, null, $message);
    }

    public function delete($id)
    {
        $this->jadwalKelasRepository->delete($id);
    }

    public function edit(MengelolaJadwalKuliahRequest $request)
    {
        $this->jadwalKelasRepository->save(
            $request->id,
            $request->idKelas,
            $request->idPeriodeKuliah,
            $request->idPrasarana,
            $request->day
        );
    }
}