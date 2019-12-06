<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\PeriodeKuliah;
use Siakad\Scheduling\Domain\Model\SemesterRepository;

class MengelolaPeriodeSemesterService
{
    private $semesterRepository;

    public function __construct(SemesterRepository $semesterRepository)
    {
        $this->semesterRepository = $semesterRepository;
    }

    public function execute(MengelolaPeriodeSemesterRequest $request)
    {
        $this->semesterRepository->save($request->semesterData);
    }

    public function delete($id)
    {
        $this->semesterRepository->delete($id);
    }
}