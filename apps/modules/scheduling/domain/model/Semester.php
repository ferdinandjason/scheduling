<?php

namespace Siakad\Scheduling\Domain\Model;

class Semester
{
    private $id;
    private $nama;
    private $singkatan;
    private $semester;
    private $aktif;
    private $tanggalMulai;
    private $tanggalSelesai;

    public function __construct($id, $nama, $singkatan, $semester, $aktif, $tanggalMulai, $tanggalSelesai)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->singkatan = $singkatan;
        $this->semester = $semester;
        $this->aktif = $aktif;
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalSelesai = $tanggalSelesai;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
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