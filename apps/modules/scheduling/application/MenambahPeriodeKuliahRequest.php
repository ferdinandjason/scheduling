<?php

namespace Siakad\Scheduling\Application;

class MenambahPeriodeKuliahRequest {
    public $jamMulai;
    public $jamSelesai;

    const MINUTE_PER_HOUR = 60;

    public function __construct($jamMulai, $jamSelesai) {
        $this->$jamMulai = $jamMulai;
        $this->$jamSelesai = $jamSelesai;
    }

    public function convertJam() {
        $this->jamMulai = convertStringToInt($this->jamMulai);
        $this->jamSelesai = convertStringToInt($this->jamSelesai);
    }

    private function convertStringToInt($jam) {
        $string = explode(".", $jam);
        $jam = intval($string[0]) * MINUTE_PER_HOUR;
        $menit = intval($string[1]);
        return $jam + $menit;
    }
}
