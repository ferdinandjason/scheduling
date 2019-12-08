<?php

namespace Siakad\Scheduling\Application;

class MengelolaJadwalKuliahRequest
{
    public $id;
    public $day;
    public $idKelas;
    public $idPeriodeKuliah;
    public $idPrasarana;

    public function __construct($id, $day, $idKelas, $idPeriodeKuliah, $idPrasarana)
    {
        $this->id = $id;
        $this->day = $day;
        $this->idKelas = $idKelas;
        $this->idPeriodeKuliah = $idPeriodeKuliah;
        $this->idPrasarana = $idPrasarana;
    }

    public function hasId()
    {
        return $this->id != null;
    }
}