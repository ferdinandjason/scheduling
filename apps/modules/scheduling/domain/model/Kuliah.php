<?php

namespace Siakad\Scheduling\Domain\Model;

class Kuliah
{
    private $idRegistrasiMahasiswa;
    private $idKelas;
    private $nilaiAngka;
    private $nilaiHuruf;
    private $lulus;

    public function getIdRegistrasiMahasiswa()
    {
        return $this->idRegistrasiMahasiswa;
    }

    public function setIdRegistrasiMahasiswa($idRegistrasiMahasiswa)
    {
        $this->idRegistrasiMahasiswa = $idRegistrasiMahasiswa;
    }

    public function getIdKelas()
    {
        return $this->idKelas;
    }

    public function setIdKelas($idKelas)
    {
        $this->idKelas = $idKelas;
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