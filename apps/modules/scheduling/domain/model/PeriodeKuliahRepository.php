<?php

namespace Siakad\Scheduling\Domain\Model;

interface PeriodeKuliahRepository
{
    public function all();
    public function byId($id);
}