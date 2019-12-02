<?php

$module = 'scheduling';
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

$router->add('/semester',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'scheduling',
    'action' => 'periodeSemester'
]);