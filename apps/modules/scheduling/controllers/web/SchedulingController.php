<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;
use Siakad\Scheduling\Application\MelihatJadwalKuliahProdiRequest;
use Siakad\Scheduling\Application\MelihatJadwalKuliahProdiService;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahRequest;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahService;
use Siakad\Scheduling\Application\MenambahPeriodeKuliahRequest;
use Siakad\Scheduling\Application\MelihatPeriodeSemesterRequest;
use Siakad\Scheduling\Application\MelihatPeriodeSemesterService;
use Siakad\Scheduling\Application\MenambahPeriodeKuliahService;

class SchedulingController extends Controller
{
    public function indexAction()
    {

    }

    public function prodiAction()
    {
        $periodeKuliahTipe = $this->request->get('tipe');
        $periodeKuliahTahun = $this->request->get('tahun');

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

    public function periodeSemesterAction()
    {
        $semesterRepository = $this->di->getShared('sql_semester_repository');
        $service = new MelihatPeriodeSemesterService($semesterRepository);
        $response = $service->execute(
            new MelihatPeriodeSemesterRequest()
        );

        $this->view->setVar('periodeSemester', $response->data);
        return $this->view->pick('jadwal/periode-semester');
    }

    public function periodeKuliahAction()
    {
        $periodeKuliahRepository = $this->di->getShared('sql_periode_kuliah_repository');
        $service = new MelihatPeriodeKuliahService($periodeKuliahRepository);
        $response = $service->execute(
            new MelihatPeriodeKuliahRequest()
        );

        $this->view->setVar('periodeKuliah', $response->data);
        return $this->view->pick('jadwal/periode-kuliah');
    }

    public function periodeKuliahTambahAction() {
        $this->view->setVar('action', 'Tambah');
        if ($this->request->isPost()) {
            $jamMulaiString = $this->request->getPost('jam_mulai');
            $jamSelesaiString = $this->request->getPost('jam_selesai');
            $request = new MenambahPeriodeKuliahRequest($jamMulaiString, $jamSelesaiString);
            $request->convertJam();

            $periodeKuliahRepository = $this->di->getShared('sql_periode_kuliah_repository');
            $service = new MenambahPeriodeKuliahService($periodeKuliahRepository);
            $service->execute($request);

            $this->flashSession->success('Periode kuliah tersimpan!');
        }
        $this->view->setVar('id_periode_kuliah', '');
        $this->view->setVar('jam_mulai', '');
        $this->view->setVar('jam_selesai', '');
        return $this->view->pick('jadwal/periode-kuliah-tambah');
    }

    public function periodeKuliahEditAction() {
        $this->view->setVar('action', 'Edit');
        return $this->view->pick('jadwal/periode-kuliah-tambah');
    }

}