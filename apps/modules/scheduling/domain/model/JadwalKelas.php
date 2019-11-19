<?php

namespace Siakad\Scheduling\Domain\Model;

class JadwalKelas 
{
    private $id;
    private $idKelas;
    private $idPeriodeKuliah;
    private $idPrasarana;    
    private $hari;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdKelas()
    {
        return $this->idKelas;
    }

    public function setIdKelas($idKelas)
    {
        $this->idKelas = $idKelas;
    }

    public function getIdPeriodeKuliah()
    {
        return $this->idPeriodeKuliah;
    }

    public function setIdPeriodeKuliah($idPeriodeKuliah)
    {
        $this->idPeriodeKuliah = $idPeriodeKuliah;
    }

    public function getIdPrasarana()
    {
        return $this->idPrasarana;
    }

    public function setIdPrasarana($idPrasarana)
    {
        $this->idPrasarana = $idPrasarana;
    }

    public function getHari()
    {
        return $this->hari;
    }

    public function setHari($hari)
    {
        $this->hari = $hari;
    }


}