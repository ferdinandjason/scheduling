<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\Prasarana;
use Siakad\Scheduling\Domain\Model\PrasaranaRepository;
use Siakad\scheduling\exception\PrasaranaNotFoundException;

class SqlPrasaranaRepository implements PrasaranaRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'all' => $this->connection->prepare("
                SELECT * FROM `prasarana`;
            ")
        ];

        $this->statementTypes = [
            'all' => []
        ];
    }

    public static function transformResultSetToEntity($item)
    {
        return new Prasarana($item['id'], $item['nama']);
    }

    public function all()
    {
        $result = $this->connection->executePrepared(
            $this->statement['all'], [], []
        );

        $prasarana = array();
        foreach ($result as $item) {
            array_push($prasarana, self::transformResultSetToEntity($item));
        }

        return $prasarana;
    }
}