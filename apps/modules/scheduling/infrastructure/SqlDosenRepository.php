<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\Dosen;
use Siakad\Scheduling\Domain\Model\DosenRepository;

class SqlDosenRepository implements DosenRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    const INDEX_DOSEN_ID = 6, INDEX_DOSEN_NAMA = 7;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'find_by_id_kelas' => $this->connection->prepare("
                    SELECT * FROM `aktivitas_mengajar`
                    INNER JOIN `dosen` ON `dosen`.id = `aktivitas_mengajar`.id_dosen
                    WHERE `id_kelas` = :id;
                ")
        ];

        $this->statementTypes = [
            'find_by_id_kelas' => [
                Column::BIND_PARAM_INT,
            ]
        ];
    }

    public static function transformResultSetToEntity($item)
    {
        return new Dosen($item[self::INDEX_DOSEN_ID], $item[self::INDEX_DOSEN_NAMA]);
    }

    public function byIdKelas($id)
    {
        $statementData = [
            'id' => $id
        ];
        $result = $this->connection->executePrepared(
            $this->statement['find_by_id_kelas'],
            $statementData,
            $this->statementTypes['find_by_id_kelas']
        );

        foreach ($result as $item){
            return self::transformResultSetToEntity($item);
        }
    }
}