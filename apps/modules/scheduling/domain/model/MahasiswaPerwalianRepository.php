<?php

namespace Siakad\Scheduling\Domain\Model;

interface MahasiswaPerwalianRepository
{
    public function findByDosenWali($dosenId);
}