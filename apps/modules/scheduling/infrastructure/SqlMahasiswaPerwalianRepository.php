<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\Dosen;
use Siakad\Scheduling\Domain\Model\Mahasiswa;
use Siakad\Scheduling\Domain\Model\MahasiswaPerwalianRepository;
use Siakad\Scheduling\Exception\MahasiswaPerwalianNotFoundException;

class SqlMahasiswaPerwalianRepository implements MahasiswaPerwalianRepository {
    private $connection;
    private $statement;
    private $statementTypes;

    const INDEX_NRP = 0, INDEX_NAMA = 1, INDEX_ID_DOSEN_WALI = 2, INDEX_NAMA_DOSEN_WALI = 3;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'find_by_dosen_wali' => $this->connection->prepare("
            SELECT `nrp`, mahasiswa.`nama`, `id_dosen_wali`, `dosen`.`nama` AS `nama_dosen_wali` 
            FROM `mahasiswa` INNER JOIN `dosen` 
            WHERE `mahasiswa`.`id_dosen_wali` = `dosen`.`id` AND `dosen`.`id` = :dosenId;
            ")
        ];

        $this->statementTypes = [
            'find_by_dosen_wali' => [
                'dosenId' => Column::BIND_PARAM_INT
            ]
        ];
    }

    public static function transformResultSetToEntity($item)
    {
        return new Mahasiswa(
            $item[self::INDEX_NRP],
            $item[self::INDEX_NAMA],
            new Dosen(
                $item[self::INDEX_ID_DOSEN_WALI],
                $item[self::INDEX_NAMA_DOSEN_WALI]
            )
        );
    }

    public function findByDosenWali($dosenId) {
        $statementData = [
            'dosenId' => $dosenId
        ];

        $result = $this->connection->executePrepared(
            $this->statement['find_by_dosen_wali'],
            $statementData,
            $this->statementTypes['find_by_dosen_wali']
        );

        $mahasiswaPerwalian = array();
        foreach ($result as $item) {
            array_push($mahasiswaPerwalian, self::transformResultSetToEntity($item));
        }

        if( count($mahasiswaPerwalian) == 0) {
            throw new MahasiswaPerwalianNotFoundException('No Mahasiswa Perwalian with this criteria');
        }

        return $mahasiswaPerwalian;
    }
}