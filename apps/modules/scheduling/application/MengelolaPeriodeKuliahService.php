<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\PeriodeKuliah;
use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;

class MengelolaPeriodeKuliahService
{
    private $periodeKuliahRepository;

    public function __construct(PeriodeKuliahRepository $periodeKuliahRepository)
    {
        $this->periodeKuliahRepository = $periodeKuliahRepository;
    }

    public function execute(MengelolaPeriodeKuliahRequest $request)
    {
        $periode = PeriodeKuliah::convertToTimestamp($request->id, $request->mulai, $request->selesai);
        $this->periodeKuliahRepository->save($periode);
    }

    public function delete($id) {
        $this->periodeKuliahRepository->delete($id);
    }
}