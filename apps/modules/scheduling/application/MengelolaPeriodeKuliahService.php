<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\PeriodeKuliah;
use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;
use Siakad\Scheduling\Exception\PeriodeKuliahNotFoundException;

class MengelolaPeriodeKuliahService
{
    private $periodeKuliahRepository;

    public function __construct(PeriodeKuliahRepository $periodeKuliahRepository)
    {
        $this->periodeKuliahRepository = $periodeKuliahRepository;
    }

    public function execute(MengelolaPeriodeKuliahRequest $request)
    {
        $message = null;
        $periode = PeriodeKuliah::convertToTimestamp($request->id, $request->mulai, $request->selesai);

        $success = $this->periodeKuliahRepository->save($periode);
        if(!$success) {
            throw new ApplicationException("Periode Kuliah failed to be saved");
        }
    
        return new MengelolaPeriodeKuliahResponse($message);
    }

    public function delete($id)
    {
        $message = null;

        $success = $this->periodeKuliahRepository->delete($id);
        if(!$success) {
            throw new PeriodeKuliahNotFoundException("Periode Kuliah with id = {$id} not found");
        }

        return new MengelolaPeriodeKuliahResponse($message);
    }
}