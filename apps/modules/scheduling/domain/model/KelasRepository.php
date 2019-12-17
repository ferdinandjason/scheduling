<?php

namespace Siakad\Scheduling\Domain\Model;

interface KelasRepository
{
    public function all();
    public function byId($id);
}