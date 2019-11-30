<?php

namespace Siakad\Scheduling\Domain\Model;

interface JadwalKelasRepository
{
    public function byPeriodeKuliah($tipe, $tahun);
}