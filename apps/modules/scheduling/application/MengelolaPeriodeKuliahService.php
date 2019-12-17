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

        $success = $this->periodeKuliahRepository->save($periode);
        if(!$success) {
            throw new ApplicationException("Periode Kuliah failed to be saved");
        }
    
        return new MengelolaPeriodeKuliahResponse('Periode kuliah tersimpan!');
    }

    public function delete($id)
    {
        $success = $this->periodeKuliahRepository->delete($id);
        if(!$success) {
            throw new ApplicationException("Periode Kuliah with id = {$id} not found");
        }

        return new MengelolaPeriodeKuliahResponse("Data telah dihapus!");
    }
}