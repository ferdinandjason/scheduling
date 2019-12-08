<?php

namespace Siakad\Scheduling\Application;

class MengelolaPeriodeSemesterRequest
{
    public $id;
    public $nama;
    public $singkatan;
    public $tahunAjaran;
    public $semester;
    public $aktif;
    public $tanggalMulai;
    public $tanggalSelesai;

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
}