<?php

namespace Siakad\Scheduling\Application;

class MengelolaJadwalKuliahRequest
{
    public $day;

    public function __construct($day = 0)
    {
        $this->day = $day;
    }
    
}