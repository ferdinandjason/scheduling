<?php

namespace Siakad\Scheduling\Application;

class MengelolaJadwalKuliahRequest
{
    public $id;
    public $day;
    public $idKelas;
    public $idPeriodeKuliah;
    public $idPrasarana;
    public $idDosen;

    public function __construct($id, $day, $idKelas, $idPeriodeKuliah, $idPrasarana, $idDosen)
    {
        $this->id = $id;
        $this->day = $day;
        $this->idKelas = $idKelas;
        $this->idPeriodeKuliah = $idPeriodeKuliah;
        $this->idPrasarana = $idPrasarana;
        $this->idDosen = $idDosen;
    }

    public function hasId()
    {
        return $this->id != null;
    }

    public function hasDay()
    {
        return $this->day != null;
    }
}