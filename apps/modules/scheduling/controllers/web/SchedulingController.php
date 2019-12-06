<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;
use Siakad\Scheduling\Application\MelihatJadwalKuliahProdiRequest;
use Siakad\Scheduling\Application\MelihatJadwalKuliahProdiService;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahRequest;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahService;
use Siakad\Scheduling\Application\MelihatPeriodeSemesterRequest;
use Siakad\Scheduling\Application\MelihatPeriodeSemesterService;
use Siakad\Scheduling\Application\MengelolaPeriodeKuliahRequest;
use Siakad\Scheduling\Application\MengelolaPeriodeKuliahService;
use Siakad\Scheduling\Domain\Model\PeriodeKuliah;

class SchedulingController extends Controller
{
    public $jadwalKuliahRepository;

    public function initialize()
    {
        $this->jadwalKuliahRepository = $this->di->getShared('sql_jadwal_kelas_repository');
    }

    public function indexAction()
    {

    }

    public function prodiAction()
    {
        $periodeKuliahTipe = $this->request->get('tipe');
        $periodeKuliahTahun = $this->request->get('tahun');

        $service = new MelihatJadwalKuliahProdiService($this->jadwalKuliahRepository);
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