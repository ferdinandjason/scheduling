<?php

namespace Siakad\Scheduling\Domain\Model;

use Siakad\Scheduling\Application\MengelolaJadwalKuliahRequest;

interface JadwalKelasRepository
{
    public function all();
    public function byPeriodeKuliah($tipe, $tahun);
    public function byMahasiswa($nrp);
    public function byDay($day);
    public function delete($id);
    public function byId($id);
    public function save($id, $idKelas, $idPeriodeKuliah, $idPrasarana, $hari);
}