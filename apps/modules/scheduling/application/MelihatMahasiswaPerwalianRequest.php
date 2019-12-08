<?php

namespace Siakad\Scheduling\Application;

class MelihatMahasiswaPerwalianRequest
{
    public $dosenId;

    public function __construct($dosenId = null)
    {
        $this->dosenId = $dosenId;
    }
}