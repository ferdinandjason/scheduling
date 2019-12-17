<?php

namespace Siakad\Scheduling\Domain\Model;

interface JadwalKuliahProdiRepository
{
    public function byDay($day);
}