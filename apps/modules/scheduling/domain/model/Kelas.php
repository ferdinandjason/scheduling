<?php

namespace Siakad\Scheduling\Domain\Model;

class Kelas
{
    private $id;
    private $idSemester;
    private $idMataKuliah;
    private $nama;
    private $namaInggris;
    private $dayaTampung;
    private $jumlahTerisi;
    private $SKSKelas;
    private $rencanaTatapMuka;
    private $realisasiTatapMuka;
    private $kelasJarakJauh;
    private $validasiTatapMuka;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdSemester()
    {
        return $this->idSemester;
    }

    public function setIdSemester($idSemester)
    {
        $this->idSemester = $idSemester;
    }

    public function getIdMataKuliah()
    {
        return $this->idMataKuliah;
    }

    public function setIdMataKuliah($idMataKuliah)
    {
        $this->idMataKuliah = $idMataKuliah;
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

    public function getSKSKelas()
    {
        return $this->SKSKelas;
    }

    public function setSKSKelas($SKSKelas)
    {
        $this->SKSKelas = $SKSKelas;
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