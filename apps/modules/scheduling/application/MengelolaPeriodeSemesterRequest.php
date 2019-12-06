<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\Semester;

class MengelolaPeriodeSemesterRequest
{
    public $semesterData;

    public function __construct(Semester $semester)
    {
        $this->semesterData = $semester;
    }
}