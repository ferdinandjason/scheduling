<?php

namespace Siakad\Scheduling\Application;

class MelihatSatuJadwalKuliahRequest
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}