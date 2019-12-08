<?php

namespace Siakad\Scheduling\Application;

class MengelolaJadwalKuliahRequest
{
    public $day;

    public function __construct($day = null)
    {
        $this->day = $day;
    }

    public function hasParameters()
    {
        return $this->day != null;
    }
    
}