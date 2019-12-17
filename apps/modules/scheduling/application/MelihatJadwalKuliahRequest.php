<?php

namespace Siakad\Scheduling\Application;

class MelihatJadwalKuliahRequest
{
    public $day;
    public $id;

    public function __construct($day, $id = null)
    {
        $this->id = $id;
        $this->day = $day;
    }

    public function hasId()
    {
        return $this->id == null;
    }
}