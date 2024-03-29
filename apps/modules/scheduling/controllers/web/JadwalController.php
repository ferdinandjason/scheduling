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
use Siakad\Scheduling\Application\MemvalidasiJadwalKuliahProdiService;
use Siakad\Scheduling\Application\MengelolaJadwalKuliahService;
use Siakad\Scheduling\Application\MengelolaJadwalKuliahRequest;
use Siakad\Scheduling\Application\MelihatPrasaranaService;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahService;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahRequest;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahResponse;
use Siakad\Scheduling\Application\ApplicationException;

class JadwalController extends Controller
{
    private $jadwalKuliahRepository;
    private $jadwalKuliahProdiRepository;
    private $prasaranaRepository;
    private $periodeKuliahRepository;
    private $kelasRepository;
    private $dosenRepository;
    private $mataKuliahRepository;

    public function initialize()
    {
        $this->jadwalKuliahRepository = $this->di->getShared('sql_jadwal_kelas_repository');
        $this->jadwalKuliahProdiRepository = $this->di->getShared('sql_jadwal_kuliah_prodi_repository');
        $this->prasaranaRepository = $this->di->getShared('sql_prasarana_repository');
        $this->periodeKuliahRepository = $this->di->getShared('sql_periode_kuliah_repository');
        $this->kelasRepository = $this->di->getShared('sql_kelas_repository');
        $this->dosenRepository = $this->di->getShared('sql_dosen_repository');
        $this->mataKuliahRepository = $this->di->getShared('sql_mata_kuliah_repository');
    }

    public function indexAction()
    {
        $day = $this->request->get('day');
        if($day == NULL) $day = '0';

        try{
            $service = new MelihatJadwalKuliahService($this->jadwalKuliahProdiRepository);
            $jadwalKuliahProdi = $service->execute(
                new MelihatJadwalKuliahRequest($day)
            )->data;
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }

        try{
            $service = new MelihatPrasaranaService($this->prasaranaRepository);
            $prasarana = $service->execute()->data;
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }

        try{
            $service = new MelihatPeriodeKuliahService($this->periodeKuliahRepository);
            $periodeKuliah = $service->execute(new MelihatPeriodeKuliahRequest())->data;
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }

        $this->view->setVar('jadwalKuliah', $jadwalKuliahProdi->getJadwalKelas());
        $this->view->setVar('prasarana', $prasarana);
        $this->view->setVar('periodeKuliah', $periodeKuliah);
        return $this->view->pick('kelola-jadwal/index');
    }

    public function deleteAction($id)
    {
        if ($this->request->isPost()) {
            try{
                $service = new MengelolaJadwalKuliahService(
                    $this->jadwalKuliahRepository,
                    $this->jadwalKuliahProdiRepository,
                    $this->prasaranaRepository,
                    $this->periodeKuliahRepository,
                    $this->kelasRepository,
                    $this->dosenRepository
                );
                $service->delete($id);
            } catch (ApplicationException $exception){
                $this->flashSession->warning($exception->getMessage());
            }

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

            try{
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
            } catch (ApplicationException $exception){
                $this->flashSession->warning($exception->getMessage());
            }
        }

        try{
            $service = new MelihatJadwalKuliahService($this->jadwalKuliahProdiRepository);
            $jadwalKuliahProdi = $service->execute(
                new MelihatJadwalKuliahRequest($hari)
            )->data;
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }
        
        try{
            $service = new MelihatSatuJadwalKuliahService($this->jadwalKuliahRepository);
            $jadwal = $service->execute(
                new MelihatSatuJadwalKuliahRequest($id)
            )->data;
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }

        try{
            $service = new MelihatPrasaranaService($this->prasaranaRepository);
            $prasarana = $service->execute()->data;
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }

        try{
            $service = new MelihatPeriodeKuliahService($this->periodeKuliahRepository);
            $periodeKuliah = $service->execute(new MelihatPeriodeKuliahRequest())->data;
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }

        $this->view->setVar('jadwalKuliah', $jadwalKuliahProdi->getJadwalKelas());
        $this->view->setVar('jadwal', $jadwal);
        $this->view->setVar('prasarana', $prasarana);
        $this->view->setVar('periodeKuliah', $periodeKuliah);
        return $this->view->pick('kelola-jadwal/edit');
    }

    public function createAction()
    {
        if($this->request->getPost('id_kelas') != null){
            try{
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
            } catch (ApplicationException $exception){
                $this->flashSession->warning($exception->getMessage());
            }

            return $this->response->redirect('/kelola-jadwal?day='.$hari);
        }

        try{
            $service = new MelihatKelasService($this->kelasRepository);
            $kelas = $service->execute()->data;
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }

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

        try{
            $service = new MelihatJadwalKuliahProdiService($this->jadwalKuliahRepository);
            $response = $service->execute(
                new MelihatJadwalKuliahProdiRequest(
                    $periodeKuliahTipe,
                    $periodeKuliahTahun
                )
            );
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }

        $this->view->setVar('jadwalKuliah', $response->data);
        return $this->view->pick('jadwal/prodi');
    }

    public function validasiAction()
    {
        $day = $this->request->get('day');
        if($day == NULL) $day = '0';

        try{
            $service = new MemvalidasiJadwalKuliahProdiService($this->jadwalKuliahProdiRepository);
            $jadwalKuliahProdi = $service->execute($day)->data;
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }

        try{
            $service = new MelihatPrasaranaService($this->prasaranaRepository);
            $prasarana = $service->execute()->data;
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }

        try{
            $service = new MelihatPeriodeKuliahService($this->periodeKuliahRepository);
            $periodeKuliah = $service->execute(new MelihatPeriodeKuliahRequest())->data;
        } catch (ApplicationException $exception){
            $this->flashSession->warning($exception->getMessage());
        }

        $this->view->setVar('jadwalKuliah', $jadwalKuliahProdi->getJadwalKelas());
        $this->view->setVar('prasarana', $prasarana);
        $this->view->setVar('periodeKuliah', $periodeKuliah);
        return $this->view->pick('kelola-jadwal/index');
    }
}