<?php

namespace Siakad\Scheduling\Domain\Model;

class Semester
{
    private $id;
    private $idTahunAjaran;
    private $nama;
    private $namaInggris;
    private $singkatan;
    private $singkatanInggris;
    private $semester;
    private $aktif;
    private $tanggalMulai;
    private $tanggalSelesai;

    public function getNamaInggrisDariNama() {
        $awal = explode(" ", $this->nama);
        $awalInggris = "awalInggris";
        switch ($awal[0]) {
            case "Gasal":
                $awalInggris = "Odd";
                break;
            case "Genap":
                $awalInggris = "Even";
                break;
            case "Pendek":
                $awalInggris = "Short";
                break;
            default:
                $awalInggris = $awal;
                break;
        }
        return $awalInggris + " " + $awal[1];
    }

    public function getSingkatanDariNama() {
        $awal = explode(" ", $this->nama);
        $singkatan = "singkatan";
        switch ($awal[0]) {
            case "Gasal":
                $singkatan = "Gs.";
                break;
            case "Genap":
                $singkatan = "Gn.";
                break;
            case "Pendek":
                $singkatan = "Pd.";
                break;
            default:
                $singkatan = $awal;
                break;
        }
        return $singkatan + " " + $awal[1];
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdTahunAjaran()
    {
        return $this->idTahunAjaran;
    }

    public function setIdTahunAjaran($idTahunAjaran)
    {
        $this->idTahunAjaran = $idTahunAjaran;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getSingkatanInggris()
    {
        return $this->singkatanInggris;
    }

    public function setSingkatanInggris($singkatanInggris)
    {
        $this->singkatanInggris = $singkatanInggris;
    }

    public function getSemester()
    {
        return $this->semester;
    }

    public function setSemester($semester)
    {
        $this->semester = $semester;
    }

    public function getAktif()
    {
        return $this->aktif;
    }

    public function setAktif($aktif)
    {
        $this->aktif = $aktif;
    }

    public function getTanggalMulai()
    {
        return $this->tanggalMulai;
    }

    public function setTanggalMulai($tanggalMulai)
    {
        $this->tanggalMulai = $tanggalMulai;
    }

    public function getTanggalSelesai()
    {
        return $this->tanggalSelesai;
    }

    public function setTanggalSelesai($tanggalSelesai)
    {
        $this->tanggalSelesai = $tanggalSelesai;
    }
}