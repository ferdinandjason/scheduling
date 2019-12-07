<?php

namespace Siakad\Scheduling\Application;

class MengelolaJadwalKuliahResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}