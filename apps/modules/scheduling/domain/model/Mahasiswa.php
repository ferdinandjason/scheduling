<?php

namespace Siakad\Scheduling\Domain\Model;

class Mahasiswa
{
    private $nrp;
    private $nama;
    private $dosenWali;

    public function __construct($nrp, $nama, $dosenWali)
    {
        $this->nrp = $nrp;
        $this->nama = $nama;
        $this->dosenWali = $dosenWali;
    }

    public function getNRP()
    {
        return $this->nrp;
    }

    public function setNRP($nrp)
    {
        $this->nrp = $nrp;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getDosenWali()
    {
        return $this->dosenWali;
    }

    public function setDosenWali($dosenWali)
    {
        $this->dosenWali = $dosenWali;
    }

}