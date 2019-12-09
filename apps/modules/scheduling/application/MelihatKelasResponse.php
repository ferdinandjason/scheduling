<?php

namespace Siakad\Scheduling\Application;

class MelihatKelasResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}