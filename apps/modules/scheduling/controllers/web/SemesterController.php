<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;
use Siakad\Scheduling\Application\ApplicationException;
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

        if($response->hasMessage()) {
            $this->flashSession->warning($response->message);
        }

        $this->view->setVar('periodeSemester', $response->data);
        return $this->view->pick('jadwal/periode-semester');
    }

    public function addAction()
    {
        if($this->request->isPost()) {
            $response = $this->saveAction($this->request->getPost());
            
            if($response->hasMessage()) {
                $this->flashSession->warning($response->message);
            } else {
                $this->flashSession->success('Semester berhasil ditambah!');
            }
        }

        $semesterNull = new Semester(null, null, null, null, null, null, null, null);

        $this->view->setVar('action', 'Tambah');
        $this->view->setVar('periodeSemester', $semesterNull);
        return $this->view->pick('jadwal/periode-semester-tambah');
    }

    public function editAction($id)
    {
        if ($this->request->isPost()) {
            $response = $this->saveAction($this->request->getPost());

            if($response->hasMessage()) {
                $this->flashSession->warning($response->message);
            } else {
                $this->flashSession->success('Semester diperbarui!');
            }
        }

        $service = new MelihatPeriodeSemesterService($this->semesterRepository);
        try {
            $response = $service->execute(
                new MelihatPeriodeSemesterRequest($id)
            );
        } catch (ApplicationException $e) {

        }

        if($response->hasMessage()) {
            $this->flashSession->warning($response->message);
        }

        $this->view->setVar('action', 'Edit');
        $this->view->setVar('periodeSemester', $response->data);
        return $this->view->pick('jadwal/periode-semester-tambah');

    }

    public function deleteAction($id)
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost('id_semester');

            $service = new MengelolaPeriodeSemesterService($this->semesterRepository);
            $response = $service->delete($id);

            if($response->hasMessage()) {
                $this->flashSession->warning($response->message);
            } else {
                $this->flashSession->notice('Data telah dihapus!');
            }
        }

        return $this->response->redirect('/semester');
    }

    private function saveAction($request) {
        $periodeSemesterRequest = null;
        
        $nama = $request['nama'];
        $singkatan = $request['singkatan'];
        $tahunAjaran = $request['tahun_ajaran'];
        $semester = $request['semester'];
        $aktif = $request['aktif'];
        $tanggalMulai = $request['tanggal_mulai'];
        $tanggalSelesai = $request['tanggal_selesai'];

        if (array_key_exists('id_semester', $request)) {
            $idSemester = $request['id_semester'];
            $periodeSemesterRequest = new MengelolaPeriodeSemesterRequest(
                $idSemester, $nama, $singkatan, $tahunAjaran, $semester,
                $aktif, $tanggalMulai, $tanggalSelesai
            );
        } else {
            $periodeSemesterRequest = new MengelolaPeriodeSemesterRequest(
                null, $nama, $singkatan, $tahunAjaran, $semester,
                $aktif, $tanggalMulai, $tanggalSelesai
            );
        }

        $service = new MengelolaPeriodeSemesterService($this->semesterRepository);
        
        try {
            $response = $service->execute($periodeSemesterRequest);
        } catch (ApplicationException $e) {

        }

        return $response;
    }
}