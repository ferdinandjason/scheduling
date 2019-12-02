<?php

namespace Siakad\Scheduling\Application;

class MelihatJadwalKuliahProdiResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}