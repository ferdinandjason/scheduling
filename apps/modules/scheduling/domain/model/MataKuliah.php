<?php

namespace Siakad\Scheduling\Domain\Model;

class MataKuliah
{
    private $id;
    private $kodeMatkul;
    private $nama;
    private $namaInggris;
    private $SKS;
    private $deskripsi;

    public function __construct($id, $kodeMatkul, $nama, $namaInggris, $SKS, $deskripsi)
    {
        $this->id = $id;
        $this->kodeMatkul = $kodeMatkul;
        $this->nama = $nama;
        $this->namaInggris = $namaInggris;
        $this->SKS = $SKS;
        $this->deskripsi = $deskripsi;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getKodeMatkul()
    {
        return $this->kodeMatkul;
    }

    public function setKodeMatkul($kodeMatkul)
    {
        $this->kodeMatkul = $kodeMatkul;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNamaInggris()
    {
        return $this->namaInggris;
    }

    public function setNamaInggris($namaInggris)
    {
        $this->namaInggris = $namaInggris;
    }

    public function getSKS()
    {
        return $this->SKS;
    }

    public function setSKS($SKS)
    {
        $this->SKS = $SKS;
    }

    public function getDeskripsi()
    {
        return $this->deskripsi;
    }

    public function setDeskripsi($deskripsi)
    {
        $this->deskripsi = $deskripsi;
    }


}