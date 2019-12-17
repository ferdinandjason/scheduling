<?php

namespace Siakad\Scheduling\Infrastructure;

use Siakad\Scheduling\Domain\Model\KelasRepository;
use Siakad\Scheduling\Domain\Model\Kelas;
use Siakad\Scheduling\Domain\Model\MataKuliah;
use Siakad\Scheduling\Domain\Model\Semester;
use Phalcon\Db\Column;

class SqlKelasRepository implements KelasRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    const INDEX_ID_KELAS = 0, INDEX_NAMA_KELAS = 3, INDEX_NAMA_INGGRIS = 4, INDEX_DAYA_TAMPUNG = 5,
        INDEX_JUMLAH_TERISI = 6, INDEX_SKS_KELAS = 7, INDEX_RENCANA_TATAP_MUKA = 8, INDEX_REALISASI_TATAP_MUKA = 9,
        INDEX_KELAS_JARAK_JAUH = 10, INDEX_VALIDASI_TATAP_MUKA = 11,

        INDEX_ID_MATKUL = 12, INDEX_KODE_MATKUL = 13, INDEX_NAMA_MATKUL = 14, INDEX_NAMA_INGGRIS_MATKUL = 15,
        INDEX_SKS_MATKUL = 16, INDEX_DESKRIPSI_MATKUL = 17,

        INDEX_ID_SEMESTER = 18, INDEX_NAMA_SEMESTER = 19, INDEX_SINGKATAN_SEMESTER = 20, INDEX_TAHUN_AJARAN = 21,
        INDEX_SEMESTER = 22, INDEX_SEMESTER_AKTIF = 23, INDEX_TANGGAL_MULAI = 24, INDEX_TANGGAL_SELESAI = 25;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'all' => $this->connection->prepare("
                SELECT * FROM `kelas` 
                INNER JOIN `mata_kuliah` ON `kelas`.`id_mata_kuliah` = `mata_kuliah`.id
                INNER JOIN `semester` ON `kelas`.`id_semester` = `semester`.id;
            "),
            'find_by_id' => $this->connection->prepare("
                SELECT * FROM `kelas` 
                INNER JOIN `mata_kuliah` ON `kelas`.`id_mata_kuliah` = `mata_kuliah`.id
                INNER JOIN `semester` ON `kelas`.`id_semester` = `semester`.id
                WHERE `kelas`.`id` = :id;
            ")
        ];

        $this->statementTypes = [
            'all' => [],
            'find_by_id' => [
                Column::BIND_PARAM_INT,
            ]
        ];
    }

    public static function transformResultSetToEntity($item)
    {
        return new Kelas(
            $item[self::INDEX_ID_KELAS],
            new Semester(
                $item[self::INDEX_ID_SEMESTER],
                $item[self::INDEX_NAMA_SEMESTER],
                $item[self::INDEX_SINGKATAN_SEMESTER],
                $item[self::INDEX_TAHUN_AJARAN],
                $item[self::INDEX_SEMESTER],
                $item[self::INDEX_SEMESTER_AKTIF],
                $item[self::INDEX_TANGGAL_MULAI],
                $item[self::INDEX_TANGGAL_SELESAI]
            ),
            new MataKuliah(
                $item[self::INDEX_ID_MATKUL],
                $item[self::INDEX_KODE_MATKUL],
                $item[self::INDEX_NAMA_MATKUL],
                $item[self::INDEX_NAMA_INGGRIS_MATKUL],
                $item[self::INDEX_SKS_MATKUL],
                $item[self::INDEX_DESKRIPSI_MATKUL]
            ),
            $item[self::INDEX_NAMA_KELAS],
            $item[self::INDEX_NAMA_INGGRIS],
            $item[self::INDEX_DAYA_TAMPUNG],
            $item[self::INDEX_JUMLAH_TERISI],
            $item[self::INDEX_SKS_KELAS],
            $item[self::INDEX_RENCANA_TATAP_MUKA],
            $item[self::INDEX_REALISASI_TATAP_MUKA],
            $item[self::INDEX_KELAS_JARAK_JAUH],
            $item[self::INDEX_VALIDASI_TATAP_MUKA]
        );
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

    public function byId($id)
    {
        $statementData = [
            'id' => $id
        ];
        $result = $this->connection->executePrepared(
            $this->statement['find_by_id'],
            $statementData,
            $this->statementTypes['find_by_id']
        );

        foreach ($result as $item){
            return self::transformResultSetToEntity($item);
        }
    }
}