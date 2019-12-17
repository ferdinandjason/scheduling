<?php

namespace Siakad\Scheduling\Domain\Model;

class Semester
{
    private $id;
    private $nama;
    private $singkatan;
    private $tahunAjaran;
    private $semester;
    private $aktif;
    private $tanggalMulai;
    private $tanggalSelesai;

    public function __construct($id, $nama, $singkatan, $tahunAjaran, $semester, $aktif, $tanggalMulai, $tanggalSelesai)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->singkatan = $singkatan;
        $this->tahunAjaran = $tahunAjaran;
        $this->semester = $semester;
        $this->aktif = $aktif;
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalSelesai = $tanggalSelesai;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getSingkatan()
    {
        return $this->singkatan;
    }

    public function getTahunAjaran()
    {
        return $this->tahunAjaran;
    }

    public function getSemester()
    {
        return $this->semester;
    }

    public function getAktif()
    {
        return $this->aktif;
    }

    public function getTanggalMulai()
    {
        return $this->tanggalMulai;
    }

    public function getTanggalSelesai()
    {
        return $this->tanggalSelesai;
    }
}