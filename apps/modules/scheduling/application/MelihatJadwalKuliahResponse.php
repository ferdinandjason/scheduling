<?php

namespace Siakad\Scheduling\Application;

class MelihatJadwalKuliahResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}