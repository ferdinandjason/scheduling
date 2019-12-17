<?php


namespace Siakad\Scheduling\Application;


class MelihatMataKuliahResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}