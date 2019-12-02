<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\JadwalKelas;
use Siakad\Scheduling\Domain\Model\JadwalKelasRepository;
use Siakad\Scheduling\Domain\Model\Kelas;
use Siakad\Scheduling\Domain\Model\MataKuliah;
use Siakad\Scheduling\Domain\Model\PeriodeKuliah;
use Siakad\Scheduling\Domain\Model\Prasarana;
use Siakad\Scheduling\Domain\Model\Semester;

class SqlJadwalKelasRepository implements JadwalKelasRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    const INDEX_JADWAL_ID = 0, INDEX_JADWAL_HARI = 4;
    const INDEX_KELAS_ID = 5, INDEX_KELAS_NAMA = 8, INDEX_KELAS_NAMA_INGGRIS = 9, INDEX_KELAS_DAYA_TAMPUNG = 10,
          INDEX_KELAS_JUMLAH_TERISI = 11, INDEX_KELAS_SKS_KELAS = 12, INDEX_KELAS_RENCANA_TATAP_MUKA = 13,
          INDEX_KELAS_REALISASI_TATAP_MUKA = 14, INDEX_KELAS_KELAS_JARAK_JAUH = 15,INDEX_KELAS_VALIDASI_TATAP_MUKA = 16;
    const INDEX_SEMESTER_ID = 20, INDEX_SEMESTER_NAMA = 21, INDEX_SEMESTER_SINGKATAN = 22,
          INDEX_SEMESTER_TAHUN_AJARAN = 23, INDEX_SEMESTER_SEMESTER = 24, INDEX_SEMESTER_AKTIF = 25,
          INDEX_SEMESTER_TANGGAL_MULAI = 26, INDEX_SEMESTER_TANGGAL_SELESAI = 27;
    const INDEX_MATA_KULIAH_ID = 28, INDEX_MATA_KULIAH_KODE_MATA_KULIAH = 29, INDEX_MATA_KULIAH_NAMA = 30,
          INDEX_MATA_KULIAH_NAMA_INGGRIS = 31, INDEX_MATA_KULIAH_SKS = 32, INDEX_MATA_KULIAH_DESKRIPSI = 33;
    const INDEX_PERIODE_KULIAH_ID = 17, INDEX_PERIODE_KULIAH_MULAI = 18, INDEX_PERIODE_KULIAH_SELESAI = 19;
    const INDEX_PRASARANA_ID = 34, INDEX_PRASARANA_NAMA = 35;


    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'all' => $this->connection->prepare("
                SELECT *
                FROM `jadwal_kelas` INNER JOIN `kelas` ON `jadwal_kelas`.`id_kelas` = `kelas`.`id`
                                    INNER JOIN `periode_kuliah` ON `jadwal_kelas`.`id_periode_kuliah` = `periode_kuliah`.`id`
                                    INNER JOIN `semester` ON `semester`.`id` = `kelas`.`id_semester`
                                    INNER JOIN `mata_kuliah` ON `mata_kuliah`.`id` = `kelas`.`id_mata_kuliah`
                                    INNER JOIN `prasarana` ON `prasarana`.`id` = `jadwal_kelas`.`id_prasarana`;
            "),
            'find_by_periode_kuliah' => $this->connection->prepare("
                SELECT *
                FROM `jadwal_kelas` INNER JOIN `kelas` ON `jadwal_kelas`.`id_kelas` = `kelas`.`id`
                                    INNER JOIN `periode_kuliah` ON `jadwal_kelas`.`id_periode_kuliah` = `periode_kuliah`.`id`
                                    INNER JOIN `semester` ON `semester`.`id` = `kelas`.`id_semester`
                                    INNER JOIN `mata_kuliah` ON `mata_kuliah`.`id` = `kelas`.`id_mata_kuliah`
                                    INNER JOIN `prasarana` ON `prasarana`.`id` = `jadwal_kelas`.`id_prasarana`
                WHERE `semester`.`semester` = :semester AND `semester`.`tahun_ajaran` = :tahunAjaran;
            "),
        ];

        $this->statementTypes = [
            'all' => [],
            'find_by_periode_kuliah' => [
                'semester' => Column::BIND_PARAM_INT,
                'tahunAjaran' => Column::BIND_PARAM_INT,
            ]
        ];

    }

    public static function transformResultSetToEntity($item)
    {
        return new JadwalKelas(
            $item[self::INDEX_JADWAL_ID],
            new Kelas(
                $item[self::INDEX_KELAS_ID],
                new Semester(
                    $item[self::INDEX_SEMESTER_ID],
                    $item[self::INDEX_SEMESTER_NAMA],
                    $item[self::INDEX_SEMESTER_SINGKATAN],
                    $item[self::INDEX_SEMESTER_TAHUN_AJARAN],
                    $item[self::INDEX_SEMESTER_SEMESTER],
                    $item[self::INDEX_SEMESTER_AKTIF],
                    $item[self::INDEX_SEMESTER_TANGGAL_MULAI],
                    $item[self::INDEX_SEMESTER_TANGGAL_SELESAI]
                ),
                new MataKuliah(
                    $item[self::INDEX_MATA_KULIAH_ID],
                    $item[self::INDEX_MATA_KULIAH_KODE_MATA_KULIAH],
                    $item[self::INDEX_MATA_KULIAH_NAMA],
                    $item[self::INDEX_MATA_KULIAH_NAMA_INGGRIS],
                    $item[self::INDEX_MATA_KULIAH_SKS],
                    $item[self::INDEX_MATA_KULIAH_DESKRIPSI]
                ),
                $item[self::INDEX_KELAS_NAMA],
                $item[self::INDEX_KELAS_NAMA_INGGRIS],
                $item[self::INDEX_KELAS_DAYA_TAMPUNG],
                $item[self::INDEX_KELAS_JUMLAH_TERISI],
                $item[self::INDEX_KELAS_SKS_KELAS],
                $item[self::INDEX_KELAS_RENCANA_TATAP_MUKA],
                $item[self::INDEX_KELAS_REALISASI_TATAP_MUKA],
                $item[self::INDEX_KELAS_KELAS_JARAK_JAUH],
                $item[self::INDEX_KELAS_VALIDASI_TATAP_MUKA]
            ),
            new PeriodeKuliah(
                $item[self::INDEX_PERIODE_KULIAH_ID],
                $item[self::INDEX_PERIODE_KULIAH_MULAI],
                $item[self::INDEX_PERIODE_KULIAH_SELESAI]
            ),
            new Prasarana(
                $item[self::INDEX_PRASARANA_ID],
                $item[self::INDEX_PRASARANA_NAMA]
            ),
            $item[self::INDEX_JADWAL_HARI]
        );
    }

    public function all()
    {
        $result = $this->connection->executePrepared(
            $this->statement['all'], [], []
        );

        $jadwalKelas = array();
        foreach ($result as $item) {
            array_push($jadwalKelas, self::transformResultSetToEntity($item));
        }

        return $jadwalKelas;
    }

    public function byPeriodeKuliah($tipe, $tahun)
    {
        $statementData = [
            'semester' => $tipe,
            'tahunAjaran' => $tahun 
        ];

        $result = $this->connection->executePrepared(
            $this->statement['find_by_periode_kuliah'],
            $statementData,
            $this->statementTypes['find_by_periode_kuliah']
        );

        $jadwalKelas = array();
        foreach ($result as $item) {
            array_push($jadwalKelas, self::transformResultSetToEntity($item));
        }

        return $jadwalKelas;
    }
}