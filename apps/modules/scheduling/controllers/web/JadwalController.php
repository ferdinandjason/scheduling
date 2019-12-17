<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;

use Siakad\Scheduling\Application\MelihatJadwalKuliahProdiRequest;
use Siakad\Scheduling\Application\MelihatJadwalKuliahProdiService;
use Siakad\Scheduling\Application\MelihatJadwalKuliahRequest;
use Siakad\Scheduling\Application\MelihatJadwalKuliahService;
use Siakad\Scheduling\Application\MelihatKelasService;
use Siakad\Scheduling\Application\MelihatSatuJadwalKuliahRequest;
use Siakad\Scheduling\Application\MelihatSatuJadwalKuliahService;
use Siakad\Scheduling\Application\MengelolaJadwalKuliahService;
use Siakad\Scheduling\Application\MengelolaJadwalKuliahRequest;
use Siakad\Scheduling\Application\MelihatPrasaranaService;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahService;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahRequest;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahResponse;

class JadwalController extends Controller
{
    private $jadwalKuliahRepository;
    private $jadwalKuliahProdiRepository;
    private $prasaranaRepository;
    private $periodeKuliahRepository;
    private $kelasRepository;
    private $dosenRepository;

    public function initialize()
    {
        $this->jadwalKuliahRepository = $this->di->getShared('sql_jadwal_kelas_repository');
        $this->jadwalKuliahProdiRepository = $this->di->getShared('sql_jadwal_kuliah_prodi_repository');
        $this->prasaranaRepository = $this->di->getShared('sql_prasarana_repository');
        $this->periodeKuliahRepository = $this->di->getShared('sql_periode_kuliah_repository');
        $this->kelasRepository = $this->di->getShared('sql_kelas_repository');
        $this->dosenRepository = $this->di->getShared('sql_dosen_repository');
    }

    public function indexAction()
    {
        $day = $this->request->get('day');
        if($day == NULL) $day = '0';

        $service = new MelihatJadwalKuliahService($this->jadwalKuliahProdiRepository);
        $jadwalKuliahProdi = $service->execute(
            new MelihatJadwalKuliahRequest($day)
        )->data;

        $service = new MelihatPrasaranaService($this->prasaranaRepository);
        $prasarana = $service->execute()->data;

        $service = new MelihatPeriodeKuliahService($this->periodeKuliahRepository);
        $periodeKuliah = $service->execute(new MelihatPeriodeKuliahRequest())->data;

        $this->view->setVar('jadwalKuliah', $jadwalKuliahProdi->getJadwalKelas());
        $this->view->setVar('prasarana', $prasarana);
        $this->view->setVar('periodeKuliah', $periodeKuliah);
        return $this->view->pick('kelola-jadwal/index');
    }

    public function deleteAction($id)
    {
        if ($this->request->isPost()) {
            $service = new MengelolaJadwalKuliahService(
                $this->jadwalKuliahRepository,
                $this->jadwalKuliahProdiRepository,
                $this->prasaranaRepository,
                $this->periodeKuliahRepository,
                $this->kelasRepository,
                $this->dosenRepository
            );
            $service->delete($id);

            $this->flashSession->notice('Data telah dihapus!');
        }
        return $this->response->redirect('/kelola-jadwal');
    }

    public function editAction($id)
    {
        $hari = $this->request->get('hari');

        if ($this->request->isPost()) {
            $idKelas = $this->request->getPost('id_kelas');
            $idPeriodeKuliah = $this->request->get('id_periode_kuliah');
            $idPrasarana = $this->request->get('id_prasarana');

            $service = new MengelolaJadwalKuliahService(
                $this->jadwalKuliahRepository,
                $this->jadwalKuliahProdiRepository,
                $this->prasaranaRepository,
                $this->periodeKuliahRepository,
                $this->kelasRepository,
                $this->dosenRepository
            );
            $service->execute(
                new MengelolaJadwalKuliahRequest(
                    $id,
                    $hari,
                    $idKelas,
                    $idPeriodeKuliah,
                    $idPrasarana
                )
            );
        }

        $service = new MelihatJadwalKuliahService($this->jadwalKuliahProdiRepository);
        $jadwalKuliah = $service->execute(
            new MelihatJadwalKuliahRequest($hari)
        )->data;

        $service = new MelihatSatuJadwalKuliahService($this->jadwalKuliahRepository);
        $jadwal = $service->execute(
            new MelihatSatuJadwalKuliahRequest($id)
        )->data;

        $service = new MelihatPrasaranaService($this->prasaranaRepository);
        $prasarana = $service->execute()->data;

        $service = new MelihatPeriodeKuliahService($this->periodeKuliahRepository);
        $periodeKuliah = $service->execute(new MelihatPeriodeKuliahRequest())->data;

        $this->view->setVar('jadwalKuliah', $jadwalKuliah);
        $this->view->setVar('jadwal', $response->jadwal);
        $this->view->setVar('prasarana', $prasarana);
        $this->view->setVar('periodeKuliah', $periodeKuliah);
        return $this->view->pick('kelola-jadwal/edit');
    }

    public function createAction()
    {
        if($this->request->getPost('id_kelas') != null){
            $service = new MengelolaJadwalKuliahService(
                $this->jadwalKuliahRepository,
                $this->jadwalKuliahProdiRepository,
                $this->prasaranaRepository,
                $this->periodeKuliahRepository,
                $this->kelasRepository,
                $this->dosenRepository
            );

            $hari =$this->request->getPost('hari');
            $idPrasarana = $this->request->getPost('id_prasarana');
            $idPeriodeKuliah = $this->request->getPost('id_periode_kuliah');
            $idKelas = $this->request->getPost('id_kelas');

            $service->execute(
                new MengelolaJadwalKuliahRequest(
                    null,
                    $hari,
                    $idKelas,
                    $idPeriodeKuliah,
                    $idPrasarana
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