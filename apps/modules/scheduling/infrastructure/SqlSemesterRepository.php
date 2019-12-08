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

    const INDEX_ID = 0, INDEX_NAMA = 1, INDEX_SINGKATAN = 2, INDEX_TAHUN_AJARAN = 3, INDEX_SEMESTER = 4,

        INDEX_AKTIF = 5, INDEX_TANGGAL_MULAI = 6, INDEX_TANGGAL_SELESAI = 7;

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
            "),
            'save' => $this->connection->prepare("
                INSERT INTO `semester` (nama, singkatan, tahun_ajaran, semester, aktif, tanggal_mulai, tanggal_selesai) 
                VALUES (:nama, :singkatan, :tahunAjaran, :semester, :aktif, :tanggalMulai, :tanggalSelesai); 
            "),
            'update' => $this->connection->prepare("
                UPDATE `semester`
                SET 
                    `nama` = :nama,
                    `singkatan` = :singkatan,
                    `tahun_ajaran` = :tahunAjaran,
                    `semester` = :semester,
                    `aktif` = :aktif,
                    `tanggal_mulai` = :tanggalMulai,
                    `tanggal_selesai` = :tanggalSelesai
                WHERE `semester`.`id` = :id;
            "),
            'delete' => $this->connection->prepare("
                DELETE FROM semester WHERE id = :id;
            ")
        ];

        $this->statementTypes = [
            'all' => [],
            'find_by_id' => [
                'id' => Column::BIND_PARAM_INT,
            ],
            'save' => [
                'nama' => Column::BIND_PARAM_STR,
                'singkatan' => Column::BIND_PARAM_STR,
                'tahunAjaran' => Column::BIND_PARAM_INT,
                'semester' => Column::BIND_PARAM_INT,
                'aktif' => Column::BIND_PARAM_INT,
                'tanggalMulai' => Column::BIND_PARAM_STR,
                'tanggalSelesai' => Column::BIND_PARAM_STR,
            ],
            'update' => [
                'nama' => Column::BIND_PARAM_STR,
                'singkatan' => Column::BIND_PARAM_STR,
                'tahunAjaran' => Column::BIND_PARAM_INT,
                'semester' => Column::BIND_PARAM_INT,
                'aktif' => Column::BIND_PARAM_INT,
                'tanggalMulai' => Column::BIND_PARAM_STR,
                'tanggalSelesai' => Column::BIND_PARAM_STR,
                'id' => Column::BIND_PARAM_INT,
            ],
            'delete' => [
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

        $result = $this->connection->executePrepared(
            $this->statement['find_by_id'],
            $statementData,
            $this->statementTypes['find_by_id']
        );

        foreach ($result as $item) {
            return self::transformResultSetToEntity($item);
        }
    }

    public function save(Semester $periodeSemester)
    {
        if ($periodeSemester->getId() == null) {
            $statementData = [
                'nama' => $periodeSemester->getNama(),
                'singkatan' => $periodeSemester->getSingkatan(),
                'tahunAjaran' => $periodeSemester->getTahunAjaran(),
                'semester' => $periodeSemester->getSemester(),
                'aktif' => $periodeSemester->getAktif(),
                'tanggalMulai' => $periodeSemester->getTanggalMulai(),
                'tanggalSelesai' => $periodeSemester->getTanggalSelesai(),
            ];

            $result = $this->connection->executePrepared(
                $this->statement['save'],
                $statementData,
                $this->statementTypes['save']
            );
        }
        else {
            $statementData = [
                'nama' => $periodeSemester->getNama(),
                'singkatan' => $periodeSemester->getSingkatan(),
                'tahunAjaran' => $periodeSemester->getTahunAjaran(),
                'semester' => $periodeSemester->getSemester(),
                'aktif' => $periodeSemester->getAktif(),
                'tanggalMulai' => $periodeSemester->getTanggalMulai(),
                'tanggalSelesai' => $periodeSemester->getTanggalSelesai(),
                'id' => $periodeSemester->getId(),
            ];

            $result = $this->connection->executePrepared(
                $this->statement['update'],
                $statementData,
                $this->statementTypes['update']
            );
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