<?php

namespace Siakad\Scheduling\Application;

class MelihatJadwalMahasiswaPerwalianRequest
{
    public $dosenId;

    public function __construct($dosenId = null)
    {
        $this->dosenId = $dosenId;
    }
}