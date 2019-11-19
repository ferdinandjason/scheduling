<?php

namespace Siakad\Scheduling\Domain\Model;

class PeriodeKuliah
{
    private $id;
    private $mulai;
    private $selesai;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMulai()
    {
        return $this->mulai;
    }

    public function setMulai($mulai)
    {
        $this->mulai = $mulai;
    }

    public function getSelesai()
    {
        return $this->selesai;
    }

    public function setSelesai($selesai)
    {
        $this->selesai = $selesai;
    }


}