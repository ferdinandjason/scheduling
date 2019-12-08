<?php

namespace Siakad\Scheduling\Application;

class MelihatJadwalMahasiswaPerwalianRequest
{
    public $nrpMahasiswa;

    public function __construct($nrpMahasiswa)
    {
        $this->nrpMahasiswa = $nrpMahasiswa;
    }
}