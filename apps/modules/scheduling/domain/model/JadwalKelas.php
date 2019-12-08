<?php

namespace Siakad\Scheduling\Domain\Model;

class JadwalKelas 
{
    private $id;
    private $kelas;
    private $periodeKuliah;
    private $prasarana;
    private $hari;
    private $dosen;

    public function __construct($id, Kelas $kelas, PeriodeKuliah $periodeKuliah, Prasarana $prasarana, $hari, Dosen $dosen)
    {
        $this->id = $id;
        $this->kelas = $kelas;
        $this->periodeKuliah = $periodeKuliah;
        $this->prasarana = $prasarana;
        $this->hari = $hari;
        $this->dosen = $dosen;
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

    public function getHariString()
    {
        return Hari::StringForm[$this->hari];
    }

    public function setHari($hari)
    {
        $this->hari = $hari;
    }

    public function getDosen()
    {
        return $this->dosen;
    }

    public function setDosen($dosen)
    {
        $this->dosen = $dosen;
    }

    public function getKodeMatkulNamaKelasSKS()
    {
        return $this->kelas->getMataKuliah()->getKodeMatkul().
            " (".$this->kelas->getNama().") ".
            $this->kelas->getSksKelas();
    }

    public function getNamaMatkulNamaKelasSKS()
    {
        return $this->kelas->getMataKuliah()->getNama().
            " (".$this->kelas->getNama().") ".
            $this->kelas->getSksKelas();
    }
}