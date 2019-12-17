<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Response\MessageResponse;

class MengelolaJadwalKuliahResponse extends MessageResponse
{
    public $data;

    public function __construct($data, $periode, $prasarana, $jadwal, $message)
    {
        parent::__construct($message);
        $this->data = $data;
    }
}