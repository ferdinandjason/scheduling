<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\JadwalKelas;
use Siakad\Scheduling\Domain\Model\JadwalKelasRepository;
use Siakad\Scheduling\Domain\Model\Kelas;
use Siakad\Scheduling\Domain\Model\MataKuliah;
use Siakad\Scheduling\Domain\Model\PeriodeKuliah;
use Siakad\Scheduling\Domain\Model\Prasarana;
use Siakad\Scheduling\Domain\Model\Semester;
use Siakad\Scheduling\Domain\Model\TipePeriodeKuliah;

class SqlJadwalKelasRepository implements JadwalKelasRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    const HASHED_MULTIPLIER = 10;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'find_by_periode_kuliah' => $this->connection->prepare("
                SELECT *
                FROM `jadwal_kelas` INNER JOIN `kelas` ON `jadwal_kelas`.`id_kelas` = `kelas`.`id`
                                    INNER JOIN `periode_kuliah` ON `jadwal_kelas`.`id_periode_kuliah` = `periode_kuliah`.`id`
                                    INNER JOIN `semester` ON `semester`.`id` = `kelas`.`id_semester`
                                    INNER JOIN `mata_kuliah` ON `mata_kuliah`.`id` = `kelas`.`id_mata_kuliah`
                                    INNER JOIN `prasarana` ON `prasarana`.`id` = `jadwal_kelas`.`id_prasarana`
                WHERE `semester`.`semester` = :semesterHashed;
            "),
        ];

        $this->statementTypes = [
            'find_by_periode_kuliah' => [
                'semesterHashed' => Column::BIND_PARAM_INT,
            ]
        ];

    }

    public function getHashedPeriodeKuliah($tipe, $tahun)
    {
        $tipeInteger = TipePeriodeKuliah::Null;
        switch ($tipe)
        {
            case TipePeriodeKuliah::GasalString:
                $tipeInteger = TipePeriodeKuliah::Gasal;
                break;
            case TipePeriodeKuliah::GenapString:
                $tipeInteger = TipePeriodeKuliah::Genap;
                break;
            case TipePeriodeKuliah::PendekString:
                $tipeInteger = TipePeriodeKuliah::Pendek;
                break;
        }
        return $tahun * self::HASHED_MULTIPLIER + $tipeInteger;
    }

    public function byPeriodeKuliah($tipe, $tahun)
    {
        $statementData = [
            'semesterHashed' => $this->getHashedPeriodeKuliah($tipe, $tahun),
        ];

        $result =$this->connection->executePrepared(
            $this->statement['find_by_periode_kuliah'],
            $statementData,
            $this->statementTypes['find_by_periode_kuliah']
        );

        $jadwalKelas = array();
        foreach ($result as $item) {
            array_push($jadwalKelas, new JadwalKelas(
                $result[0],
                new Kelas(
                    $result[5],
                    new Semester(
                        $result[20],
                        $result[21],
                        $result[22],
                        $result[23],
                        $result[24],
                        $result[25],
                        $result[26]
                    ),
                    new MataKuliah(
                        $result[27],
                        $result[28],
                        $result[29],
                        $result[30],
                        $result[31],
                        $result[32]
                    ),
                    $result[8],
                    $result[9],
                    $result[10],
                    $result[11],
                    $result[12],
                    $result[13],
                    $result[15],
                    $result[16]
                ),
                new PeriodeKuliah(
                    $result[17],
                    $result[18],
                    $result[19]
                ),
                new Prasarana(
                    $result[33],
                    $result[34]
                ),
                $result[4]
            ));
        }
    }
}