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

$router->add('/periode-kuliah/{id}/hapus',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'scheduling',
    'action' => 'periodeKuliahHapus'
]);


/* Semester */

$router->add('/semester',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'semester',
    'action' => 'index'
]);

$router->add('/semester/tambah',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'semester',
    'action' => 'add'
]);

$router->add('/semester/{id}/edit',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'semester',
    'action' => 'edit'
]);

$router->add('/semester/{id}/hapus',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'semester',
    'action' => 'delete'
]);