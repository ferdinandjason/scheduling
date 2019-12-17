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

        try{
            if($request->hasIdPeriodeKuliah()) {
                $periodeKuliah = $this->periodeKuliahRepository->byId($request->idPeriodeKuliah);
            } else {
                $periodeKuliah = $this->periodeKuliahRepository->all();
            }
        } catch (PeriodeKuliahNotFoundException $exception) {
            $message = $exception->getMessage();
        }

        return new MelihatPeriodeKuliahResponse($periodeKuliah, $message);
    }
}