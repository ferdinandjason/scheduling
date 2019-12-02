<?php

namespace Siakad\Scheduling\Domain\Model;

interface PeriodeKuliahRepository
{
    public function all();
    public function byId($id);
    public function save(PeriodeKuliah $periode);
}