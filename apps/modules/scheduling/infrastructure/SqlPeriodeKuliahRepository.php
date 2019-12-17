<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\PeriodeKuliah;
use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;
use Siakad\Scheduling\Exception\DatabaseErrorException;
use Siakad\Scheduling\Exception\PeriodeKuliahNotFoundException;

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
            "),
            'update' => $this->connection->prepare("
                UPDATE periode_kuliah SET mulai=:mulai, selesai=:selesai
                WHERE  id = :id;
            "),
            'delete' => $this->connection->prepare("
                DELETE FROM periode_kuliah WHERE id = :id;
            ")
        ];

        $this->statementTypes = [
            'all' => [],
            'find_by_id' => [
                'id' => Column::BIND_PARAM_INT
            ],
            'save' => [
                'mulai' => Column::BIND_PARAM_INT,
                'selesai' => Column::BIND_PARAM_INT,
            ],
            'update' => [
                'id' => Column::BIND_PARAM_INT,
                'mulai' => Column::BIND_PARAM_INT,
                'selesai' => Column::BIND_PARAM_INT,
            ],
            'delete' => [
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
            $this->statement['all'],
            [],
            []
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

        foreach ($result as $item) {
            return self::transformResultSetToEntity($item);
        }
    }

    public function save(PeriodeKuliah $periodeKuliah)
    {
        if ($periodeKuliah->getId() == null) {
            $statementData = [
                'mulai' => $periodeKuliah->getMulai(),
                'selesai' => $periodeKuliah->getSelesai()
            ];

            $success = $this->connection->executePrepared(
                $this->statement['save'],
                $statementData,
                $this->statementTypes['save']
            );

            if(!$success) {
                throw new DatabaseErrorException("Periode Kuliah failed to save");
            }
        }
        else {
            $statementData = [
                'id' => $periodeKuliah->getId(),
                'mulai' => $periodeKuliah->getMulai(),
                'selesai' => $periodeKuliah->getSelesai()
            ];

            $success = $this->connection->executePrepared(
                $this->statement['update'],
                $statementData,
                $this->statementTypes['update']
            );

            if(!$success) {
                throw new PeriodeKuliahNotFoundException("Periode Kuliah with id = {$periodeKuliah->getId()} not found");
            }
        }
    }

    public function delete($id) {

        $statementData = [
            'id' => $id,
        ];

        $result = $this->connection->executePrepared(
            $this->statement['delete'],
            $statementData,
            $this->statementTypes['delete']
        );
    }
}
