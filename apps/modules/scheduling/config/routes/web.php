<?php

$namespaceWeb = 'Siakad\Scheduling\Controllers\Web';

$router->add('/jadwal/prodi',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'scheduling',
    'action' => 'prodi'
]);

$router->add('/periode-kuliah',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'scheduling',
    'action' => 'periodeKuliah'
]);

$router->add('/periode-kuliah/tambah',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'scheduling',
    'action' => 'periodeKuliahTambah'
]);

$router->add('/periode-kuliah/{id}/edit',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'scheduling',
    'action' => 'periodeKuliahEdit'
]);

$router->add('/semester',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'scheduling',
    'action' => 'periodeSemester'
]);