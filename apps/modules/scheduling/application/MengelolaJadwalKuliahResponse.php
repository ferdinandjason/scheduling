<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Response\MessageResponse;

class MengelolaJadwalKuliahResponse extends MessageResponse
{
    public $data;
    public $periode;
    public $prasarana;
    public $jadwal;

    public function __construct($data, $periode, $prasarana, $jadwal, $message)
    {
        parent::__construct($message);
        $this->data = $data;
        $this->periode = $periode;
        $this->prasarana = $prasarana;
        $this->jadwal = $jadwal;
    }
}