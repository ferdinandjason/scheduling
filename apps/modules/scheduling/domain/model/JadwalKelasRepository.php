<?php

namespace Siakad\Scheduling\Domain\Model;

interface JadwalKelasRepository
{
    public function all();
    public function byPeriodeKuliah($tipe, $tahun);
    public function byDay($day);
    public function delete($id);
    public function byMahasiswa($nrp);
    public function byDosen($id);
}