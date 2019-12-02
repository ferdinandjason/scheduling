<?php

namespace Siakad\Scheduling\Application;

class MelihatPeriodeSemesterRequest
{
    public $idSemester;

    public function __construct($idSemester = null)
    {
        $this->idSemester = $idSemester;
    }

    public function hasIdSemester()
    {
        return $this->idSemester != null;
    }
}