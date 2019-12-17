<?php

namespace Siakad\Scheduling\Domain\Model;

class AktivitasMengajar
{
    private $dosen;
    private $kelas;
    private $sksMengajar;
    private $rencanaTatapMuka;
    private $realisasiTatapMuka;
    private $validasiTatapMuka;

    public function __construct(Dosen $dosen, Kelas $kelas, $sksMengajar, $rencanaTatapMuka, $realisasiTatapMuka, $validasiTatapMuka)
    {
        $this->dosen = $dosen;
        $this->kelas = $kelas;
        $this->sksMengajar = $sksMengajar;
        $this->rencanaTatapMuka = $rencanaTatapMuka;
        $this->realisasiTatapMuka = $realisasiTatapMuka;
        $this->validasiTatapMuka = $validasiTatapMuka;
    }

    public function getDosen()
    {
        return $this->dosen;
    }

    public function getKelas()
    {
        return $this->kelas;
    }

    public function getSKSMengajar()
    {
        return $this->sksMengajar;
    }

    public function getRencanaTatapMuka()
    {
        return $this->rencanaTatapMuka;
    }

    public function getRealisasiTatapMuka()
    {
        return $this->realisasiTatapMuka;
    }

    public function getValidasiTatapMuka()
    {
        return $this->validasiTatapMuka;
    }

}