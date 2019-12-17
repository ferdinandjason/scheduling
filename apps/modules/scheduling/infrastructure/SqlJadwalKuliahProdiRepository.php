<?php

namespace Siakad\Scheduling\Infrastructure;

use Siakad\Scheduling\Domain\Model\JadwalKuliahProdiRepository;
use Siakad\Scheduling\Domain\Model\JadwalKuliahProdi;
class SqlJadwalKuliahProdiRepository implements JadwalKuliahProdiRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'find_by_day' => $this->connection->prepare("
                SELECT *
                FROM `jadwal_kelas` INNER JOIN `kelas` ON `jadwal_kelas`.`id_kelas` = `kelas`.`id`
                                    INNER JOIN `periode_kuliah` ON `jadwal_kelas`.`id_periode_kuliah` = `periode_kuliah`.`id`
                                    INNER JOIN `semester` ON `semester`.`id` = `kelas`.`id_semester`
                                    INNER JOIN `mata_kuliah` ON `mata_kuliah`.`id` = `kelas`.`id_mata_kuliah`
                                    INNER JOIN `prasarana` ON `prasarana`.`id` = `jadwal_kelas`.`id_prasarana`
                                    INNER JOIN `aktivitas_mengajar` on `jadwal_kelas`.id_kelas = `aktivitas_mengajar`.`id_kelas`
                                    INNER JOIN `dosen` ON `aktivitas_mengajar`.id_dosen = `dosen`.`id`
                WHERE `jadwal_kelas`.`hari` = :day;
            ")
        ];

        $this->statementTypes = [
            'find_by_day' => [
                'day' => Column::BIND_PARAM_INT,
            ],
        ];
    }

    public function byDay($day)
    {
        $statementData = [
            'day' => $day,
        ];

        $result = $this->connection->executePrepared(
            $this->statement['find_by_day'],
            $statementData,
            $this->statementTypes['find_by_day']
        );

        $jadwalKelas = array();
        foreach ($result as $item) {
            array_push($jadwalKelas, SqlJadwalKelasRepository::transformResultSetToEntity($item));
        }
        
        return new JadwalKuliahProdi($day, $jadwalKelas);
    }
}