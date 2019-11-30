<?php

namespace Siakad\Scheduling\Domain\Model;

class JadwalKelas 
{
    private $id;
    private $kelas;
    private $periodeKuliah;
    private $prasarana;
    private $hari;

    public function __construct($id, Kelas $kelas, PeriodeKuliah $periodeKuliah, Prasarana $prasarana, $hari)
    {
        $this->id = $id;
        $this->kelas = $kelas;
        $this->periodeKuliah = $periodeKuliah;
        $this->prasarana = $prasarana;
        $this->hari = $hari;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getKelas()
    {
        return $this->kelas;
    }

    public function setKelas($kelas)
    {
        $this->kelas = $kelas;
    }

    public function getPeriodeKuliah()
    {
        return $this->periodeKuliah;
    }

    public function setPeriodeKuliah($periodeKuliah)
    {
        $this->periodeKuliah = $periodeKuliah;
    }

    public function getPrasarana()
    {
        return $this->prasarana;
    }

    public function setPrasarana($prasarana)
    {
        $this->prasarana = $prasarana;
    }

    public function getHari()
    {
        return $this->hari;
    }

    public function setHari($hari)
    {
        $this->hari = $hari;
    }


}