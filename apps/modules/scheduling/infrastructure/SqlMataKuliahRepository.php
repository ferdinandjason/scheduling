<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\MataKuliah;
use Siakad\Scheduling\Domain\Model\MataKuliahRepository;

class SqlMataKuliahRepository implements MataKuliahRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    const INDEX_ID_MATKUL = 0, INDEX_KODE_MATKUL = 1, INDEX_NAMA_MATKUL = 2, INDEX_NAMA_INGGRIS = 3,
        INDEX_SKS_MATKUL = 4, INDEX_DESKRIPSI_MATKUL = 5;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'all' => $this->connection->prepare("
                SELECT * FROM `mata_kuliah`;
            ")
        ];

        $this->statementTypes = [
            'all' => []
        ];
    }

    private static function transformResultSetToEntity($item)
    {
        return new MataKuliah(
            $item[self::INDEX_ID_MATKUL],
            $item[self::INDEX_KODE_MATKUL],
            $item[self::INDEX_NAMA_MATKUL],
            $item[self::INDEX_NAMA_INGGRIS],
            $item[self::INDEX_SKS_MATKUL],
            $item[self::INDEX_DESKRIPSI_MATKUL]
        );
    }

    public function all()
    {
        $result = $this->connection->executePrepared(
            $this->statement['all'], [], []
        );

        $allMatkul = array();
        foreach ($result as $item) {
            array_push($allMatkul, self::transformResultSetToEntity($item));
        }

        return $allMatkul;
    }
}