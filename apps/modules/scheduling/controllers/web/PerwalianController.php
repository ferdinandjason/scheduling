<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;

class PerwalianController extends Controller {
    // public $jadwalPerwalianRepository;
    public $mahasiswaPerwalianRepository;

    public function initialize() {
        // $this->jadwalPerwalianRepository = $this->di->getShared('sql_jadwal_perwalian_repository');
        $this->mahasiswaPerwalianRepository = $this->di->getShared('sql_mahasiswa_perwalian_repository');
    }

}