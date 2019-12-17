<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahRequest;
use Siakad\Scheduling\Application\MelihatPeriodeKuliahService;
use Siakad\Scheduling\Application\MengelolaPeriodeKuliahRequest;
use Siakad\Scheduling\Application\MengelolaPeriodeKuliahService;
use Siakad\Scheduling\Domain\Model\PeriodeKuliah;

class PeriodeKuliahController extends Controller
{
    private $periodeKuliahRepository;

    public function initialize()
    {
        $this->periodeKuliahRepository = $this->di->getShared('sql_periode_kuliah_repository');
    }

    public function indexAction()
    {
        $service = new MelihatPeriodeKuliahService($this->periodeKuliahRepository);
        $response = $service->execute(
            new MelihatPeriodeKuliahRequest()
        );

        if($response->hasMessage()) {
            $this->flashSession->warning($response->message);
        }

        $this->view->setVar('periodeKuliah', $response->data);
        return $this->view->pick('jadwal/periode-kuliah');
    }

    public function addAction()
    {
        if ($this->request->isPost()) {
            $jamMulai = $this->request->getPost('jam_mulai');
            $jamSelesai = $this->request->getPost('jam_selesai');

            $service = new MengelolaPeriodeKuliahService($this->periodeKuliahRepository);
            $response = $service->execute(new MengelolaPeriodeKuliahRequest(
                null, $jamMulai,$jamSelesai
            ));

            if($response->hasMessage()) {
                $this->flashSession->warning($response->message);
            } else {
                $this->flashSession->success('Periode kuliah tersimpan!');
            }
        }

        $periodeKuliahNull = new PeriodeKuliah(null, null, null);

        $this->view->setVar('action', 'Tambah');
        $this->view->setVar('periodeKuliah', $periodeKuliahNull);
        return $this->view->pick('jadwal/periode-kuliah-tambah');
    }

    public function editAction($id)
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost('id_periode_kuliah');
            $jamMulai = $this->request->getPost('jam_mulai');
            $jamSelesai = $this->request->getPost('jam_selesai');

            $service = new MengelolaPeriodeKuliahService($this->periodeKuliahRepository);
            $response = $service->execute(new MengelolaPeriodeKuliahRequest(
                $id, $jamMulai,$jamSelesai
            ));

            if($response->hasMessage()) {
                $this->flashSession->warning($response->message);
            } else {
                $this->flashSession->success('Periode kuliah diperbarui!');
            }
        }

        $service = new MelihatPeriodeKuliahService($this->periodeKuliahRepository);
        $response = $service->execute(
            new MelihatPeriodeKuliahRequest($id)
        );

        if($response->hasMessage()) {
            $this->flashSession->warning($response->message);
        }

        $this->view->setVar('action', 'Edit');
        $this->view->setVar('periodeKuliah', $response->data);
        return $this->view->pick('jadwal/periode-kuliah-tambah');
    }

    public function deleteAction($id)
    {
        if ($this->request->isPost()) {
            $service = new MengelolaPeriodeKuliahService($this->periodeKuliahRepository);
            $response = $service->delete($id);

            if($response->hasMessage()) {
                $this->flashSession->warning($response->message);
            } else {
                $this->flashSession->notice('Data telah dihapus!');
            }
        }
        return $this->response->redirect('/periode-kuliah');
    }
}