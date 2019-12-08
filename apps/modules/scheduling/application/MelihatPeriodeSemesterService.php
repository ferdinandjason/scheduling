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

        try {
            if($request->hasIdSemester()) {
                $semester = $this->semesterRepository->byId($request->idSemester);
            } else {
                $semester = $this->semesterRepository->all();
            }
        } catch (SemesterNotFoundException $exception) {
            $message = $exception->getMessage();
        }

        return new MelihatPeriodeSemesterResponse($semester, $message);
    }
}