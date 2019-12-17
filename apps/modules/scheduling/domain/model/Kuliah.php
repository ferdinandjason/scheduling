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

    public function getKelas()
    {
        return $this->kelas;
    }

    public function getNilaiAngka()
    {
        return $this->nilaiAngka;
    }

    public function getNilaiHuruf()
    {
        return $this->nilaiHuruf;
    }

    public function getLulus()
    {
        return $this->lulus;
    }

}