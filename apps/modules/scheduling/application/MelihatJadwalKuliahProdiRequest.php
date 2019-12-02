<?php

namespace Siakad\Scheduling\Application;

class MelihatJadwalKuliahProdiRequest
{
    public $periodeKuliahTahun;
    public $periodeKuliahTipe;

    public function __construct($tipe =  null, $tahun = null)
    {
        $this->periodeKuliahTahun = $tahun;
        $this->periodeKuliahTipe = $tipe;
    }

    public function hasParameters()
    {
        return $this->periodeKuliahTipe != null && $this->periodeKuliahTahun != null;
    }
}