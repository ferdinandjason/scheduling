<?php

namespace Siakad\Scheduling\Domain\Model;

class PeriodeKuliah
{
    private $id;
    private $mulai;
    private $selesai;

    const MINUTE_PER_HOUR = 60;

    public function __construct($id, $mulai, $selesai)
    {
        $this->id = $id;
        $this->mulai = $mulai;
        $this->selesai = $selesai;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMulai()
    {
        return $this->mulai;
    }

    public function setMulai($mulai)
    {
        $this->mulai = $mulai;
    }

    public function getSelesai()
    {
        return $this->selesai;
    }

    public function setSelesai($selesai)
    {
        $this->selesai = $selesai;
    }

    public function getStringForm()
    {
        $jamMulai = intdiv($this->mulai, self::MINUTE_PER_HOUR);
        $menitMulai = fmod($this->mulai, self::MINUTE_PER_HOUR);

        $jamSelesai = intdiv($this->selesai, self::MINUTE_PER_HOUR);
        $menitSelesai = fmod($this->selesai, self::MINUTE_PER_HOUR);

        return sprintf("%s.%s - %s.%s", str_pad($jamMulai, 2, '0', STR_PAD_LEFT),
                                                str_pad($menitMulai, 2, '0', STR_PAD_LEFT),
                                                str_pad($jamSelesai, 2, '0', STR_PAD_LEFT),
                                                str_pad($menitSelesai, 2, '0',STR_PAD_LEFT)
        );
    }

    public function getStringFormMulai()
    {
        $jamMulai = intdiv($this->mulai, self::MINUTE_PER_HOUR);
        $menitMulai = fmod($this->mulai, self::MINUTE_PER_HOUR);

        return sprintf("%s.%s", str_pad($jamMulai, 2, '0', STR_PAD_LEFT),
                                        str_pad($menitMulai, 2, '0', STR_PAD_LEFT)
        );
    }

    public function getStringFormSelesai()
    {
        $jamSelesai = intdiv($this->selesai, self::MINUTE_PER_HOUR);
        $menitSelesai = fmod($this->selesai, self::MINUTE_PER_HOUR);

        return sprintf("%s.%s",
            str_pad($jamSelesai, 2, '0', STR_PAD_LEFT),
            str_pad($menitSelesai, 2, '0',STR_PAD_LEFT)
        );
    }

    public static function convertToTimestamp($jamMulai, $jamSelesai) {
        $newMulai = self::convertStringToInt($jamMulai);
        $newSelesai = self::convertStringToInt($jamSelesai);
        $newPeriode = new PeriodeKuliah(null, $newMulai, $newSelesai);
        return $newPeriode;
    }

    public static function convertStringToInt($jam) {
        $string = explode(".", $jam);
        $jam = intval($string[0]) * MINUTE_PER_HOUR;
        $menit = intval($string[1]);
        return $jam + $menit;
    }

}