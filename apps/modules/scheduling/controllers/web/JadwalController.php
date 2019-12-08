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
        $service = new MengelolaJadwalKuliahService(
            $this->jadwalKuliahRepository, 
            $this->prasaranaRepository,
            $this->periodeKuliahRepository
        );

        $day = $this->request->get('day');
        if($day == NULL) $day = 0;
        $response = $service->execute(
            new MengelolaJadwalKuliahRequest(null, $day, null, null, null)
        );

        $this->view->setVar('jadwalKuliah', $response->data);
        $this->view->setVar('prasarana', $response->prasarana);
        $this->view->setVar('periodeKuliah', $response->periode);
        return $this->view->pick('kelola-jadwal/index');
    }

    public function deleteAction($id)
    {
        if ($this->request->isPost()) {
            $service = new MengelolaJadwalKuliahService(
                $this->jadwalKuliahRepository, 
                $this->prasaranaRepository,
                $this->periodeKuliahRepository);
            $service->delete($id);

            $this->flashSession->notice('Data telah dihapus!');
        }
        return $this->response->redirect('/kelola-jadwal');
    }

    public function editAction($id)
    {
        $service = new MengelolaJadwalKuliahService(
            $this->jadwalKuliahRepository, 
            $this->prasaranaRepository,
            $this->periodeKuliahRepository);
        
            if ($this->request->isPost()) {
                $service = new MengelolaJadwalKuliahService(
                    $this->jadwalKuliahRepository, 
                    $this->prasaranaRepository,
                    $this->periodeKuliahRepository);
                
                $idKelas = $this->request->getPost('id_kelas');
                $idPeriodeKuliah = $this->request->get('id_periode_kuliah');
                $idPrasarana = $this->request->get('id_prasarana');
                $hari = $this->request->get('hari'); 
                $service->edit(new MengelolaJadwalKuliahRequest(
                    $id,
                    $hari,
                    $idKelas,
                    $idPeriodeKuliah,
                    $idPrasarana
                ));
    
                $this->flashSession->notice('Data telah diubah!');
            }
        
        $service = new MengelolaJadwalKuliahService(
            $this->jadwalKuliahRepository, 
            $this->prasaranaRepository,
            $this->periodeKuliahRepository);
        $response = $service->execute(new MengelolaJadwalKuliahRequest($id, null, null, null, null));

        $this->view->setVar('jadwalKuliah', $response->data);
        $this->view->setVar('jadwal', $response->jadwal);
        $this->view->setVar('prasarana', $response->prasarana);
        $this->view->setVar('periodeKuliah', $response->periode);
        return $this->view->pick('kelola-jadwal/edit');
    }
}