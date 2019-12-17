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

        return new MengelolaPeriodeSemesterResponse('Semester diperbarui!');
    }

    public function delete($id)
    {
        $success = $this->semesterRepository->delete($id);
        if(!$success) {
            throw new ApplicationException("Semester with id = {$id} not found");
        }

        return new MengelolaPeriodeSemesterResponse('Data telah dihapus!');
    }
}