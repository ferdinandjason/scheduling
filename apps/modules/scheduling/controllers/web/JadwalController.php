<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;

use Siakad\Scheduling\Application\MelihatJadwalKuliahProdiRequest;
use Siakad\Scheduling\Application\MelihatJadwalKuliahProdiService;
use Siakad\Scheduling\Application\MelihatKelasService;
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
    private $kelasRepository;

    public function initialize()
    {
        $this->jadwalKuliahRepository = $this->di->getShared('sql_jadwal_kelas_repository');
        $this->prasaranaRepository = $this->di->getShared('sql_prasarana_repository');
        $this->periodeKuliahRepository = $this->di->getShared('sql_periode_kuliah_repository');
        $this->kelasRepository = $this->di->getShared('sql_kelas_repository');
    }

    public function indexAction()
    {
        $service = new MengelolaJadwalKuliahService(
            $this->jadwalKuliahRepository, 
            $this->prasaranaRepository,
            $this->periodeKuliahRepository,
            $this->kelasRepository
        );

        $day = $this->request->get('day');
        if($day == NULL) $day = '0';
        
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
                $this->periodeKuliahRepository,
                $this->kelasRepository);
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
            $this->periodeKuliahRepository,
            $this->kelasRepository
        );
        
        if ($this->request->isPost()) {
            $idKelas = $this->request->getPost('id_kelas');
            $idPeriodeKuliah = $this->request->get('id_periode_kuliah');
            $idPrasarana = $this->request->get('id_prasarana');
            $hari = $this->request->get('hari');

            $save = $service->save(
                new MengelolaJadwalKuliahRequest(
                    $id,
                    $hari,
                    $idKelas,
                    $idPeriodeKuliah,
                    $idPrasarana
                )
            );

            if(!$save){
                $this->flashSession->warning('Tempat/Waktu tidak Tersedia!');
            } else {
                $this->flashSession->notice('Data telah diubah!');
            }
        }

        $response = $service->execute(new MengelolaJadwalKuliahRequest($id, null, null, null, null));

        $this->view->setVar('jadwalKuliah', $response->data);
        $this->view->setVar('jadwal', $response->jadwal);
        $this->view->setVar('prasarana', $response->prasarana);
        $this->view->setVar('periodeKuliah', $response->periode);
        return $this->view->pick('kelola-jadwal/edit');
    }

    public function createAction()
    {
        if($this->request->getPost('id_kelas') != null){
            $service = new MengelolaJadwalKuliahService(
                $this->jadwalKuliahRepository,
                $this->prasaranaRepository,
                $this->periodeKuliahRepository,
                $this->kelasRepository
            );

            $hari =$this->request->getPost('hari');
            $idPrasarana = $this->request->getPost('id_prasarana');
            $idPeriodeKuliah = $this->request->getPost('id_periode_kuliah');
            $idKelas = $this->request->getPost('id_kelas');

            $service->save(
                new MengelolaJadwalKuliahRequest(
                    null,
                    $hari,
                    $idPrasarana,
                    $idPeriodeKuliah,
                    $idKelas
                )
            );

            return $this->response->redirect('/kelola-jadwal?day='.$hari);
        }
        
        $service = new MelihatKelasService($this->kelasRepository);
        $kelas = $service->execute()->data;

        $this->view->setVar('jadwalKuliah', $kelas);
        $this->view->setVar('hari', $this->request->getPost('hari'));
        $this->view->setVar('kelas', $this->request->getPost('kelas'));
        $this->view->setVar('periode', $this->request->getPost('periode'));
        $this->view->setVar('id_prasarana', $this->request->getPost('id_prasarana'));
        $this->view->setVar('id_periode', $this->request->getPost('id_periode'));

        return $this->view->pick('kelola-jadwal/create');
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