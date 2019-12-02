<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;
use Siakad\Scheduling\Application\MelihatJadwalKuliahProdiRequest;
use Siakad\Scheduling\Application\MelihatJadwalKuliahProdiService;

class SchedulingController extends Controller
{
    const HEHE = 'hehe';

    public function indexAction()
    {

    }

    public function prodiAction()
    {
        $periodeKuliahTipe = $this->dispatcher->getParam('tipe');
        $periodeKuliahTahun = $this->dispatcher->getParam('tahun');

        $jadwalKuliahRepository = $this->di->getShared('sql_jadwal_kelas_repository');
        $service = new MelihatJadwalKuliahProdiService($jadwalKuliahRepository);
        $response = $service->execute(
            new MelihatJadwalKuliahProdiRequest(
                $periodeKuliahTipe,
                $periodeKuliahTahun
            )
        );

        $this->view->setVar('jadwalKuliah', $response->data);
        return $this->view->pick('jadwal/prodi');
    }

}