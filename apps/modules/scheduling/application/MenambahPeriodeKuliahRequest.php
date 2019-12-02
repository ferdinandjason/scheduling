<?php

namespace Siakad\Scheduling\Application;

class MenambahPeriodeKuliahRequest {
    public $mulai;
    public $selesai;

    public function __construct($mulai, $selesai) {
        $this->$mulai = $mulai;
        $this->$selesai = $selesai;
    }
}
