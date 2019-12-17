<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\Semester;
use Siakad\Scheduling\Domain\Model\SemesterRepository;
use Siakad\Scheduling\Exception\SemesterNotFoundException;

class MengelolaPeriodeSemesterService
{
    private $semesterRepository;

    public function __construct(SemesterRepository $semesterRepository)
    {
        $this->semesterRepository = $semesterRepository;
    }

    public function execute(MengelolaPeriodeSemesterRequest $request)
    {
        $message = null;

        $success = $this->semesterRepository->save(
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
        if(!$success) {
            throw new ApplicationException("Semester failed to be saved");
        }

        return new MengelolaPeriodeSemesterResponse($message);
    }

    public function delete($id)
    {
        $message = null;

        $success = $this->semesterRepository->delete($id);
        if(!$success) {
            throw new SemesterNotFoundException("Semester with id = {$id} not found");
        }

        return new MengelolaPeriodeSemesterResponse($message);
    }
}