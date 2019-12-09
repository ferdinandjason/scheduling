<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\MahasiswaPerwalianRepository;
use Siakad\Scheduling\Exception\MahasiswaPerwalianNotFoundException;

class MelihatMahasiswaPerwalianService
{
    private $mahasiswaPerwalianRepository;

    public function __construct(MahasiswaPerwalianRepository $mahasiswaPerwalianRepository)
    {
        $this->mahasiswaPerwalianRepository = $mahasiswaPerwalianRepository;
    }

    public function execute(MelihatMahasiswaPerwalianRequest $request) {
        $message = null;
        $mahasiswa = null;

        try {
            $mahasiswa = $this->mahasiswaPerwalianRepository->findByDosenWali($request->dosenId);
        } catch (MahasiswaPerwalianNotFoundException $exception) {
            $message = $exception->getMessage();
        }

        return new MelihatMahasiswaPerwalianResponse($mahasiswa, $message);
    }
}