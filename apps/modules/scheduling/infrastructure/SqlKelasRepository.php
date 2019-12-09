<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\KelasRepository;
use Siakad\Scheduling\Domain\Model\Kelas;
use Siakad\Scheduling\Domain\Model\Semester;

class SqlKelasRepository implements KelasRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    const INDEX_ID_KELAS = 0, INDEX_KODE_MATKUL = 13, INDEX_NAMA_MATKUL = 14, INDEX_SKS = 7, INDEX_NAMA_KELAS = 3;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'all' => $this->connection->prepare("
                SELECT * 
                FROM `kelas` INNER JOIN `mata_kuliah` ON `kelas`.`id_mata_kuliah` = `mata_kuliah`.id
                INNER JOIN `semester` ON `kelas`.`id_semester` = `semester`.id;
            ")
        ];

        $this->statementTypes = [
            'all' => []
        ];
    }

    public static function transformResultSetToEntity($item)
    {
        $kelas = [
            'id_kelas' => $item[self::INDEX_ID_KELAS],
            'kode_matkul' => $item[self::INDEX_KODE_MATKUL],
            'nama_matkul' => $item[self::INDEX_NAMA_MATKUL],
            'sks' => $item[self::INDEX_SKS],
            'nama_kelas' => $item[self::INDEX_NAMA_KELAS]
        ];
        return $kelas;
    }

    public function all()
    {
        $result = $this->connection->executePrepared(
            $this->statement['all'], [], []
        );

        $allKelas = array();
        foreach ($result as $item) {
            array_push($allKelas, self::transformResultSetToEntity($item));
        }

        return $allKelas;
    }
}