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

    public function getNama()
    {
        return $this->nama;
    }

}