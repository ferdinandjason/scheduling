<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\Semester;
use Siakad\Scheduling\Domain\Model\SemesterRepository;

class SqlSemesterRepository implements SemesterRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    const INDEX_ID = 0, INDEX_NAMA = 1, INDEX_SINGKATAN = 2, INDEX_TAHUN_AJARAN = 3, INDEX_SEMESTER = 4, INDEX_AKTIF = 5, INDEX_TANGGAL_MULAI = 6, INDEX_TANGGAL_SELESAI = 7;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'all' => $this->connection->prepare("
                SELECT * FROM `semester`;
            "),
            'find_by_id' => $this->connection->prepare("
                SELECT * FROM `semester`
                WHERE id = :id;
            ")
        ];

        $this->statementTypes = [
            'all' => [],
            'find_by_id' => [
                'id' => Column::BIND_PARAM_INT,
            ]
        ];
    }

    public static function transformResultSetToEntity($item)
    {
        return new Semester(
            $item[self::INDEX_ID],
            $item[self::INDEX_NAMA],
            $item[self::INDEX_SINGKATAN],
            $item[self::INDEX_TAHUN_AJARAN],
            $item[self::INDEX_SEMESTER],
            $item[self::INDEX_AKTIF],
            $item[self::INDEX_TANGGAL_MULAI],
            $item[self::INDEX_TANGGAL_SELESAI]
        );
    }

    public function all()
    {
        $result = $this->connection->executePrepared(
            $this->statement['all'], [], []
        );

        $semester = array();
        foreach ($result as $item) {
            array_push($semester, self::transformResultSetToEntity($item));
        }
        
        return $semester;
    }

    public function byId($id)
    {
        $statementData = [
            'id' => $id,
        ];

        $result = $this->connection->executePrepare(
            $this->statement['find_by_id'],
            $statementData,
            $this->statementTypes['find_by_id']
        );

        return self::transformResultSetToEntity($result);
    }
}