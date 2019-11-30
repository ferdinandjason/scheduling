<?php

namespace Siakad\Scheduling\Domain\Model;

class Kuliah
{
    private $nrpMahasiswa;
    private $kelas;
    private $nilaiAngka;
    private $nilaiHuruf;
    private $lulus;

    public function __construct($nrpMahasiswa, Kelas $kelas, $nilaiAngka, $nilaiHuruf, $lulus)
    {
        $this->nrpMahasiswa = $nrpMahasiswa;
        $this->kelas = $kelas;
        $this->nilaiAngka = $nilaiAngka;
        $this->nilaiHuruf = $nilaiHuruf;
        $this->lulus = $lulus;
    }

    public function getNrpMahasiswa()
    {
        return $this->nrpMahasiswa;
    }

    public function setNrpMahasiswa($nrpMahasiswa)
    {
        $this->nrpMahasiswa = $nrpMahasiswa;
    }

    public function getKelas()
    {
        return $this->kelas;
    }

    public function setKelas($kelas)
    {
        $this->kelas = $kelas;
    }

    public function getNilaiAngka()
    {
        return $this->nilaiAngka;
    }

    public function setNilaiAngka($nilaiAngka)
    {
        $this->nilaiAngka = $nilaiAngka;
    }

    public function getNilaiHuruf()
    {
        return $this->nilaiHuruf;
    }

    public function setNilaiHuruf($nilaiHuruf)
    {
        $this->nilaiHuruf = $nilaiHuruf;
    }

    public function getLulus()
    {
        return $this->lulus;
    }

    public function setLulus($lulus)
    {
        $this->lulus = $lulus;
    }

}