<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\PeriodeKuliah;
use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;

class MenambahPeriodeKuliahService {
    private $periodeKuliahRepository;

    public function __construct(PeriodeKuliahRepository $periodeKuliahRepository)
    {
        $this->periodeKuliahRepository = $periodeKuliahRepository;
    }

    public function execute(MenambahPeriodeKuliahRequest $request)
    {
        $periode = PeriodeKuliah::convertToTimestamp($request->jamMulai, $request->jamSelesai);
        $this->periodeKuliahRepository->save($periode);
    }
}