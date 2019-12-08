<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\MahasiswaPerwalianRepository;

class MelihatMahasiswaPerwalianService
{
    private $mahasiswaPerwalianRepository;

    public function __construct(MahasiswaPerwalianRepository $mahasiswaPerwalianRepository)
    {
        $this->mahasiswaPerwalianRepository = $mahasiswaPerwalianRepository;
    }

    public function execute(MelihatMahasiswaPerwalianRequest $request) {
        $mahasiswa = $this->mahasiswaPerwalianRepository->findByDosenWali($request->dosenId);
        return new MelihatMahasiswaPerwalianResponse($mahasiswa);
    }
}