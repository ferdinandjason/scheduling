<?php

namespace Siakad\Scheduling\Application;

class MelihatMahasiswaPerwalianResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}