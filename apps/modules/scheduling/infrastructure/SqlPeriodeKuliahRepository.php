<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\PeriodeKuliah;
use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;

class SqlPeriodeKuliahRepository implements PeriodeKuliahRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    const INDEX_ID = 0, INDEX_MULAI = 1, INDEX_SELESAI = 2;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'all' => $this->connection->prepare("
                SELECT * FROM `periode_kuliah`;
            "),
            'find_by_id' => $this->connection->prepare("
                SELECT * FROM `periode_kuliah`
                WHERE id = :id;
            "),
            'save' => $this->connection->prepare("
                INSERT INTO periode_kuliah(mulai,selesai)
                VALUES(:mulai, :selesai);
            ")
        ];

        $this->statementTypes = [
            'all' => [],
            'find_by_id' => [
                'id' => Column::BIND_PARAM_INT
            ]
        ];
    }

    public static function transformResultSetToEntity($item)
    {
        return new PeriodeKuliah(
            $item[self::INDEX_ID],
            $item[self::INDEX_MULAI],
            $item[self::INDEX_SELESAI]
        );
    }

    public function all()
    {
        $result = $this->connection->executePrepared(
            $this->statement['all'], [], []
        );

        $periodeKuliah = array();
        foreach ($result as $item) {
            array_push($periodeKuliah, self::transformResultSetToEntity($item));
        }
        
        return $periodeKuliah;
    }

    public function byId($id)
    {
        $statementData = [
            'id' => $id,
        ];

        $result = $this->connection->executePrepared(
            $this->statement['find_by_id'],
            $statementData,
            $this->statementTypes['find_by_id']
        );

        return self::transformResultSetToEntity($result);
    }

    public function save(PeriodeKuliah $periodeKuliah) {
        $statementData = [
            'mulai' => $periodeKuliah->mulai,
            'selesai' => $periodeKuliah->selesai
        ];

        $result = $this->connection->executePrepared(
            $this->statement['save'],
            $statementData
        );
    }
}