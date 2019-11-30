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

    public function setDosen($dosen)
    {
        $this->dosen = $dosen;
    }

    public function getKelas()
    {
        return $this->kelas;
    }

    public function setKelas($kelas)
    {
        $this->kelas = $kelas;
    }

    public function getSKSMengajar()
    {
        return $this->sksMengajar;
    }

    public function setSKSMengajar($sksMengajar)
    {
        $this->sksMengajar = $sksMengajar;
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

    public function getValidasiTatapMuka()
    {
        return $this->validasiTatapMuka;
    }

    public function setValidasiTatapMuka($validasiTatapMuka)
    {
        $this->validasiTatapMuka = $validasiTatapMuka;
    }

}