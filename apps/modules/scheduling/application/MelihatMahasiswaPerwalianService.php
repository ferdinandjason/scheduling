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

        $mahasiswa = $this->mahasiswaPerwalianRepository->findByDosenWali($request->dosenId);
        if (!$mahasiswa) {
            throw new ApplicationException("Dosen with id = {$request->dosenId} not found");
        }

        return new MelihatMahasiswaPerwalianResponse($mahasiswa, $message);
    }
}