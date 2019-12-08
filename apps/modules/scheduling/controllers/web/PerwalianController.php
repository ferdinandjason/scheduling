<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;
use Siakad\Scheduling\Application\MelihatMahasiswaPerwalianRequest;
use Siakad\Scheduling\Application\MelihatMahasiswaPerwalianService;

class PerwalianController extends Controller {
    // public $jadwalPerwalianRepository;
    public $mahasiswaPerwalianRepository;

    public function initialize() {
        // $this->jadwalPerwalianRepository = $this->di->getShared('sql_jadwal_perwalian_repository');
        $this->mahasiswaPerwalianRepository = $this->di->getShared('sql_mahasiswa_perwalian_repository');
    }

    public function perwalianAction($id) {
        $service = new MelihatMahasiswaPerwalianService($this->mahasiswaPerwalianRepository);
        $response = $service->execute(
            new MelihatMahasiswaPerwalianRequest($id)
        );
        // var_dump($response->data);
        // die('bebe');
        $this->view->setVar('mahasiswaPerwalian', $response->data);
        return $this->view->pick('jadwal/mahasiswaPerwalian');
    }
}