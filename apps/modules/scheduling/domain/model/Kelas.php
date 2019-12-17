<?php

namespace Siakad\Scheduling\Domain\Model;

class Kelas
{
    private $id;
    private $semester;
    private $mataKuliah;
    private $nama;
    private $namaInggris;
    private $dayaTampung;
    private $jumlahTerisi;
    private $sksKelas;
    private $rencanaTatapMuka;
    private $realisasiTatapMuka;
    private $kelasJarakJauh;
    private $validasiTatapMuka;

    public function __construct($id, Semester $semester, MataKuliah $mataKuliah, $nama, $namaInggris, $dayaTampung, $jumlahTerisi, $sksKelas, $rencanaTatapMuka, $realisasiTatapMuka, $kelasJarakJauh, $validasiTatapMuka)
    {
        $this->id = $id;
        $this->semester = $semester;
        $this->mataKuliah = $mataKuliah;
        $this->nama = $nama;
        $this->namaInggris = $namaInggris;
        $this->dayaTampung = $dayaTampung;
        $this->jumlahTerisi = $jumlahTerisi;
        $this->sksKelas = $sksKelas;
        $this->rencanaTatapMuka = $rencanaTatapMuka;
        $this->realisasiTatapMuka = $realisasiTatapMuka;
        $this->kelasJarakJauh = $kelasJarakJauh;
        $this->validasiTatapMuka = $validasiTatapMuka;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSemester()
    {
        return $this->semester;
    }

    public function getMataKuliah()
    {
        return $this->mataKuliah;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getSksKelas()
    {
        return $this->sksKelas;
    }
}