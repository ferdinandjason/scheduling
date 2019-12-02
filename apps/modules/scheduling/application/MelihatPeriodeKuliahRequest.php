<?php

namespace Siakad\Scheduling\Application;

class MelihatPeriodeKuliahRequest
{
    public $idPeriodeKuliah;

    public function __construct($idPeriodeKuliah = null)
    {
        $this->idPeriodeKuliah = $idPeriodeKuliah;
    }

    public function hasIdPeriodeKuliah()
    {
        return $this->idPeriodeKuliah != null;
    }
}