<?php

use Phalcon\Mvc\View;
use Siakad\Scheduling\Infrastructure\SqlDosenRepository;
use Siakad\Scheduling\Infrastructure\SqlJadwalKelasRepository;
use Siakad\Scheduling\Infrastructure\SqlJadwalKuliahProdiRepository;
use Siakad\Scheduling\Infrastructure\SqlMahasiswaPerwalianRepository;
use Siakad\Scheduling\Infrastructure\SqlPeriodeKuliahRepository;
use Siakad\Scheduling\Infrastructure\SqlSemesterRepository;
use Siakad\Scheduling\Infrastructure\SqlPrasaranaRepository;
use Siakad\Scheduling\Infrastructure\SqlKelasRepository;

$di['voltServiceMail'] = function($view) use ($di) {

    $config = $di->get('config');

    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
    if (!is_dir($config->mail->cacheDir)) {
        mkdir($config->mail->cacheDir);
    }

    $compileAlways = $config->mode == 'DEVELOPMENT' ? true : false;

    $volt->setOptions(array(
        "compiledPath" => $config->mail->cacheDir,
        "compiledExtension" => ".compiled",
        "compileAlways" => $compileAlways
    ));
    return $volt;
};

$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
    );

    return $view;
};

$di->setShared('sql_jadwal_kelas_repository', function() use ($di) {
    $repo = new SqlJadwalKelasRepository($di);
    return $repo;
});

$di->setShared('sql_semester_repository', function() use ($di) {
    $repo = new SqlSemesterRepository($di);
    return $repo;
});

$di->setShared('sql_periode_kuliah_repository', function() use ($di) {
    $repo = new SqlPeriodeKuliahRepository($di);
    return $repo;
});

$di->setShared('sql_prasarana_repository', function() use ($di) {
    $repo = new SqlPrasaranaRepository($di);
    return $repo;
});

$di->setShared('sql_mahasiswa_perwalian_repository', function() use ($di) {
    $repo = new SqlMahasiswaPerwalianRepository($di);
    return $repo;
});

$di->setShared('sql_kelas_repository', function() use ($di) {
    $repo = new SqlKelasRepository($di);
    return $repo;
});

$di->setShared('sql_jadwal_kuliah_prodi_repository', function () use ($di) {
    $repo = new SqlJadwalKuliahProdiRepository($di);
    return $repo;
});

$di->setShared('sql_dosen_repository', function () use ($di) {
$repo = new SqlDosenRepository($di);
    return $repo;
});