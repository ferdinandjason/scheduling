<?php

namespace Siakad\Scheduling\Domain\Model;

class AktivitasMengajar
{
    private $idDosen;
    private $idKelas;
    private $urutan;
    private $SKSMengajar;
    private $rencanaTatapMuka;
    private $realisasiTatapMuka;
    private $validasiTatapMuka;
    private $waktuValidasiTatapMuka;

    public function getIdDosen()
    {
        return $this->idDosen;
    }

    public function setIdDosen($idDosen)
    {
        $this->idDosen = $idDosen;
    }

    public function getIdKelas()
    {
        return $this->idKelas;
    }

    public function setIdKelas($idKelas)
    {
        $this->idKelas = $idKelas;
    }

    public function getUrutan()
    {
        return $this->urutan;
    }

    public function setUrutan($urutan)
    {
        $this->urutan = $urutan;
    }

    public function getSKSMengajar()
    {
        return $this->SKSMengajar;
    }

    public function setSKSMengajar($SKSMengajar)
    {
        $this->SKSMengajar = $SKSMengajar;
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

    public function getWaktuValidasiTatapMuka()
    {
        return $this->waktuValidasiTatapMuka;
    }

    public function setWaktuValidasiTatapMuka($waktuValidasiTatapMuka)
    {
        $this->waktuValidasiTatapMuka = $waktuValidasiTatapMuka;
    }

}