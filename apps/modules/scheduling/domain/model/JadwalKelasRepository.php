<?php

namespace Siakad\Scheduling\Domain\Model;

interface JadwalKelasRepository
{
    public function all();
    public function byPeriodeKuliah($tipe, $tahun);
}