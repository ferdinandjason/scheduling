<?php


namespace Siakad\Scheduling\Application;


class MelihatSatuJadwalKuliahResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}