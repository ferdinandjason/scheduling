<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\SemesterRepository;
use Siakad\Scheduling\Exception\SemesterNotFoundException;

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
        $message = null;

        if($request->hasIdSemester()) {
            $semester = $this->semesterRepository->byId($request->idSemester);
            if (!$semester) {
                throw new ApplicationException("Semester with id = {$request->idSemester} not found");
            }
        } else {
            $semester = $this->semesterRepository->all();
        }

        return new MelihatPeriodeSemesterResponse($semester, $message);
    }
}