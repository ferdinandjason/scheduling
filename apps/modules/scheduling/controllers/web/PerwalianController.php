<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;
use Siakad\Scheduling\Application\ApplicationException;
use Siakad\Scheduling\Application\MelihatJadwalMahasiswaPerwalianRequest;
use Siakad\Scheduling\Application\MelihatJadwalMahasiswaPerwalianService;
use Siakad\Scheduling\Application\MelihatMahasiswaPerwalianRequest;
use Siakad\Scheduling\Application\MelihatMahasiswaPerwalianService;

class PerwalianController extends Controller {
    public $mahasiswaPerwalianRepository;
    public $jadwalKuliahRepository;

    public function initialize() {
        $this->mahasiswaPerwalianRepository = $this->di->getShared('sql_mahasiswa_perwalian_repository');
        $this->jadwalKuliahRepository = $this->di->getShared('sql_jadwal_kelas_repository');
    }

    public function perwalianAction($id) {
        $service = new MelihatMahasiswaPerwalianService($this->mahasiswaPerwalianRepository);
        try {
            $response = $service->execute(
                new MelihatMahasiswaPerwalianRequest($id)
            );
        } catch (ApplicationException $e) {
            $this->flashSession->warning($e->message);
            return $this->response->redirect('/dosen/1/perwalian');
        }

        if($response->hasMessage()) {
            $this->flashSession->warning($response->message);
        }

        $this->view->setVar('mahasiswaPerwalian', $response->data);
        return $this->view->pick('jadwal/mahasiswa-perwalian');
    }

    public function jadwalMahasiswaAction($nrpMahasiswa) {
        $service = new MelihatJadwalMahasiswaPerwalianService($this->jadwalKuliahRepository);
        try {
            $response = $service->execute(
                new MelihatJadwalMahasiswaPerwalianRequest($nrpMahasiswa)
            );
        } catch (ApplicationException $e) {
            $this->flashSession->warning($e->message);
            return $this->response->redirect('/dosen/1/perwalian');
        }

        $this->view->setVar('jadwalKuliah', $response->data);
        return $this->view->pick('jadwal/mahasiswa-jadwal');
    }
}