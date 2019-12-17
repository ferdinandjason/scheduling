<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;
use Siakad\Scheduling\Exception\PeriodeKuliahNotFoundException;

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
        $message = null;

        if($request->hasIdPeriodeKuliah()) {
            $periodeKuliah = $this->periodeKuliahRepository->byId($request->idPeriodeKuliah);
            if ($periodeKuliah == null) {
                throw new ApplicationException("Periode Kuliah with id = {$request->idPeriodeKuliah} not found");
            }
        } else {
            $periodeKuliah = $this->periodeKuliahRepository->all();
        }

        return new MelihatPeriodeKuliahResponse($periodeKuliah, $message);
    }
}