<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\SemesterRepository;

class MelihatPeriodeSemesterService
{
    private $semesterRepository;

    public function __construct(SemesterRepository $semesterRepository)
    {
        $this->semesterRepository = $semesterRepository;
    }

    public function execute(MelihatPeriodeSemesterRequest $request)
    {
        $semester = null;
        if($request->hasIdSemester()) {
            $semester = $this->semesterRepository->byId($request->idSemester);
        } else {
            $semester = $this->semesterRepository->all();
        }
        return new MelihatPeriodeSemesterResponse($semester);
    }
}