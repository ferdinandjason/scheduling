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

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSemester()
    {
        return $this->semester;
    }

    public function setSemester($semester)
    {
        $this->semester = $semester;
    }

    public function getMataKuliah()
    {
        return $this->mataKuliah;
    }

    public function setMataKuliah($mataKuliah)
    {
        $this->mataKuliah = $mataKuliah;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNamaInggris()
    {
        return $this->namaInggris;
    }

    public function setNamaInggris($namaInggris)
    {
        $this->namaInggris = $namaInggris;
    }

    public function getDayaTampung()
    {
        return $this->dayaTampung;
    }

    public function setDayaTampung($dayaTampung)
    {
        $this->dayaTampung = $dayaTampung;
    }

    public function getJumlahTerisi()
    {
        return $this->jumlahTerisi;
    }

    public function setJumlahTerisi($jumlahTerisi)
    {
        $this->jumlahTerisi = $jumlahTerisi;
    }

    public function getSksKelas()
    {
        return $this->sksKelas;
    }

    public function setSksKelas($sksKelas)
    {
        $this->sksKelas = $sksKelas;
    }

    public function getRencanaTatapMuka()
    {
        return $this->rencanaTatapMuka;
    }

    public function setRencanaTatapMuka($rencanaTatapMuka)
    {
        $this->rencanaTatapMuka = $rencanaTatapMuka;
    }

    public function getRealisasiTatapMuka()
    {
        return $this->realisasiTatapMuka;
    }

    public function setRealisasiTatapMuka($realisasiTatapMuka)
    {
        $this->realisasiTatapMuka = $realisasiTatapMuka;
    }

    public function getKelasJarakJauh()
    {
        return $this->kelasJarakJauh;
    }

    public function setKelasJarakJauh($kelasJarakJauh)
    {
        $this->kelasJarakJauh = $kelasJarakJauh;
    }

    public function getValidasiTatapMuka()
    {
        return $this->validasiTatapMuka;
    }

    public function setValidasiTatapMuka($validasiTatapMuka)
    {
        $this->validasiTatapMuka = $validasiTatapMuka;
    }


}