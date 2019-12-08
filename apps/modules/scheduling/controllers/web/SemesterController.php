<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;
use Siakad\Scheduling\Application\MelihatPeriodeSemesterRequest;
use Siakad\Scheduling\Application\MelihatPeriodeSemesterService;
use Siakad\Scheduling\Application\MengelolaPeriodeSemesterRequest;
use Siakad\Scheduling\Application\MengelolaPeriodeSemesterService;
use Siakad\Scheduling\Domain\Model\Semester;

class SemesterController extends Controller
{
    private $semesterRepository;

    public function initialize()
    {
        $this->semesterRepository = $this->di->getShared('sql_semester_repository');
    }

    public function indexAction()
    {
        $service = new MelihatPeriodeSemesterService($this->semesterRepository);
        $response = $service->execute(
            new MelihatPeriodeSemesterRequest()
        );

        $this->view->setVar('periodeSemester', $response->data);
        return $this->view->pick('jadwal/periode-semester');
    }

    public function addAction()
    {
        if($this->request->isPost()) {
            $nama = $this->request->getPost('nama');
            $singkatan = $this->request->getPost('singkatan');
            $tahunAjaran = $this->request->getPost('tahun_ajaran');
            $semester = $this->request->getPost('semester');
            $aktif = $this->request->getPost('aktif');
            $tanggalMulai = $this->request->getPost('tanggal_mulai');
            $tanggalSelesai = $this->request->getPost('tanggal_selesai');

            $service = new MengelolaPeriodeSemesterService($this->semesterRepository);
            $service->execute(
                new MengelolaPeriodeSemesterRequest(
                    null, $nama, $singkatan, $tahunAjaran, $semester,
                    $aktif, $tanggalMulai, $tanggalSelesai
                )
            );

            $this->flashSession->success('Semester berhasil ditambah!');
        }

        $semesterNull = new Semester(null, null, null, null, null, null, null, null);

        $this->view->setVar('action', 'Tambah');
        $this->view->setVar('periodeSemester', $semesterNull);
        return $this->view->pick('jadwal/periode-semester-tambah');
    }

    public function editAction($id)
    {
        if ($this->request->isPost()) {
            $idSemester = $this->request->getPost('id_semester');
            $nama = $this->request->getPost('nama');
            $singkatan = $this->request->getPost('singkatan');
            $tahunAjaran = $this->request->getPost('tahun_ajaran');
            $semester = $this->request->getPost('semester');
            $aktif = $this->request->getPost('aktif');
            $tanggalMulai = $this->request->getPost('tanggal_mulai');
            $tanggalSelesai = $this->request->getPost('tanggal_selesai');

            $service = new MengelolaPeriodeSemesterService($this->semesterRepository);
            $service->execute(
                new MengelolaPeriodeSemesterRequest(
                    $idSemester, $nama, $singkatan, $tahunAjaran, $semester,
                    $aktif, $tanggalMulai, $tanggalSelesai
                )
            );

            $this->flashSession->success('Semester diperbarui!');
        }

        $service = new MelihatPeriodeSemesterService($this->semesterRepository);
        $response = $service->execute((
            new MelihatPeriodeSemesterRequest($id)
        ));

        $this->view->setVar('action', 'Edit');
        $this->view->setVar('periodeSemester', $response->data);
        return $this->view->pick('jadwal/periode-semester-tambah');

    }

    public function deleteAction($id)
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost('id_semester');

            $service = new MengelolaPeriodeSemesterService($this->semesterRepository);
            $service->delete($id);

            $this->flashSession->notice('Data telah dihapus!');
        }

        return $this->response->redirect('/semester');
    }
}