<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;

class MelihatPeriodeKuliahService
{
    private $periodeKuliahRepository;

    public function __construct(PeriodeKuliahRepository $periodeKuliahRepository)
    {
        $this->periodeKuliahRepository = $periodeKuliahRepository;
    }

    public function execute(MelihatPeriodeKuliahRequest $request)
    {
        $periodeKuliah = null;
        if($request->hasIdPeriodeKuliah()) {
            $periodeKuliah = $this->periodeKuliahRepository->byId($request->idPeriodeKuliah);
        } else {
            $periodeKuliah = $this->periodeKuliahRepository->all();
        }
        return new MelihatPeriodeKuliahResponse($periodeKuliah);
    }
}