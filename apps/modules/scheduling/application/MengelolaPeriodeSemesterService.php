<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\Semester;
use Siakad\Scheduling\Domain\Model\SemesterRepository;

class MengelolaPeriodeSemesterService
{
    private $semesterRepository;

    public function __construct(SemesterRepository $semesterRepository)
    {
        $this->semesterRepository = $semesterRepository;
    }

    public function execute(MengelolaPeriodeSemesterRequest $request)
    {
        $this->semesterRepository->save(
            new Semester(
                $request->id,
                $request->nama,
                $request->singkatan,
                $request->tahunAjaran,
                $request->semester,
                $request->aktif,
                $request->tanggalMulai,
                $request->tanggalSelesai
            )
        );
    }

    public function delete($id)
    {
        $this->semesterRepository->delete($id);
    }
}