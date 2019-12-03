<?php

namespace Siakad\Scheduling\Application;

class MengelolaPeriodeKuliahRequest {
    public $id;
    public $mulai;
    public $selesai;

    public function __construct($id, $mulai, $selesai) {
        $this->id = $id;
        $this->mulai = $mulai;
        $this->selesai = $selesai;
    }
}
