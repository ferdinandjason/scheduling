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

    public function getKodeMatkul()
    {
        return $this->kodeMatkul;
    }

    public function getNama()
    {
        return $this->nama;
    }

}