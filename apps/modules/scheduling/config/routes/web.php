<?php

$namespaceWeb = 'Siakad\Scheduling\Controllers\Web';

$router->add('/jadwal/prodi',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'scheduling',
    'action' => 'prodi'
]);

/* Kelola Jadwal */

$router->add('/kelola-jadwal',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'jadwal',
    'action' => 'index'
]);

$router->add('/kelola-jadwal/tambah',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'jadwal',
    'action' => 'create'
]);

$router->add('/kelola-jadwal/{id}/hapus',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'jadwal',
    'action' => 'delete'
]);

$router->add('/kelola-jadwal/{id}/edit',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'jadwal',
    'action' => 'edit'
]);

/* Periode Kuliah */

$router->add('/periode-kuliah',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'periodeKuliah',
    'action' => 'index'
]);

$router->add('/periode-kuliah/tambah',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'periodeKuliah',
    'action' => 'add'
]);

$router->add('/periode-kuliah/{id}/edit',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'periodeKuliah',
    'action' => 'edit'
]);

$router->add('/periode-kuliah/{id}/hapus',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'periodeKuliah',
    'action' => 'delete'
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

/* Perwalian */
$router->add('/dosen/{id}/perwalian', [
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'perwalian',
    'action' => 'perwalian'
]);

$router->add('/jadwal/perwalian/{nrpMahasiswa}', [
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'perwalian',
    'action' => 'jadwalMahasiswa'
]);