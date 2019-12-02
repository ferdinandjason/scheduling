<?php

namespace Siakad\Scheduling\Application;

class MelihatPeriodeKuliahResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}