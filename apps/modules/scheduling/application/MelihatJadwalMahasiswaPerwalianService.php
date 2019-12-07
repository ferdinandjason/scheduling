<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\MahasiswaPerwalianRepository;

class MelihatJadwalMahasiswaPerwalianService
{
    private $mahasiswaPerwalianRepository;

    public function __construct(MahasiswaPerwalianRepository $mahasiswaPerwalianRepository)
    {
        $this->mahasiswaPerwalianRepository = $mahasiswaPerwalianRepository;
    }

    public function execute(MelihatJadwalMahasiswaPerwalianRequest $request) {
        
    }
}