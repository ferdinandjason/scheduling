<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\PeriodeKuliah;
use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;
use Siakad\Scheduling\Exception\DatabaseErrorException;
use Siakad\scheduling\exception\PeriodeKuliahNotFoundException;

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

        try {
            $this->periodeKuliahRepository->save($periode);
        } catch (DatabaseErrorException $exception) {
            $message = $exception->getMessage();
        }

        return new MengelolaPeriodeKuliahResponse($message);
    }

    public function delete($id)
    {
        $message = null;

        try{
            $this->periodeKuliahRepository->delete($id);
        } catch (PeriodeKuliahNotFoundException $exception) {
            $message = $exception->getMessage();
        }

        return new MengelolaPeriodeKuliahResponse($message);
    }
}