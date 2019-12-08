<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;

use Siakad\Scheduling\Application\MengelolaJadwalKuliahService;
use Siakad\Scheduling\Application\MengelolaJadwalKuliahRequest;
use Siakad\Scheduling\Application\MelihatPrasaranaService;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahService;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahRequest;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahResponse;

class JadwalController extends Controller
{
    private $jadwalKuliahRepository;
    private $prasaranaRepository;
    private $periodeKuliahRepository;

    public function initialize()
    {
        $this->jadwalKuliahRepository = $this->di->getShared('sql_jadwal_kelas_repository');
        $this->prasaranaRepository = $this->di->getShared('sql_prasarana_repository');
        $this->periodeKuliahRepository = $this->di->getShared('sql_periode_kuliah_repository');
    }

    public function indexAction()
    {
        $service = new MengelolaJadwalKuliahService($this->jadwalKuliahRepository);

        $day = $this->request->get('day');
        if($day == NULL) $day = 0;
        $response = $service->execute(
            new MengelolaJadwalKuliahRequest($day)
        );

        $service = new MelihatPrasaranaService($this->prasaranaRepository);
        $prasarana = $service->execute();

        $service = new MelihatPeriodeKuliahService($this->periodeKuliahRepository);
        $periodeKuliah = $service->execute(
            new MelihatPeriodeKuliahRequest()
        );

        // var_dump($response->data);
        // exit(0);

        $this->view->setVar('jadwalKuliah', $response->data);
        $this->view->setVar('prasarana', $prasarana->data);
        $this->view->setVar('periodeKuliah', $periodeKuliah->data);
        return $this->view->pick('kelola-jadwal/index');
    }

    public function deleteAction($id)
    {
        if ($this->request->isPost()) {
            $service = new MengelolaJadwalKuliahService($this->jadwalKuliahRepository);
            $service->delete($id);

            $this->flashSession->notice('Data telah dihapus!');
        }
        return $this->response->redirect('/kelola-jadwal');
    }
}