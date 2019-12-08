<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\Semester;
use Siakad\Scheduling\Domain\Model\SemesterRepository;
use Siakad\Scheduling\Exception\DatabaseErrorException;
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

        try {
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
        } catch (DatabaseErrorException $exception) {
            $message = $exception->getMessage();
        }

        return new MengelolaPeriodeSemesterResponse($message);
    }

    public function delete($id)
    {
        $message = null;

        try {
            $this->semesterRepository->delete($id);
        } catch (SemesterNotFoundException $exception) {
            $message = $exception->getMessage();
        }

        return new MengelolaPeriodeSemesterResponse($message);

    }
}