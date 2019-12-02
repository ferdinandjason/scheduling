<?php

$module = 'scheduling';
$namespaceWeb = 'Siakad\Scheduling\Controllers\Web';

$router->add('/jadwal/prodi',[
    'namespace' => $namespaceWeb,
    'module' => 'scheduling',
    'controller' => 'scheduling',
    'action' => 'prodi'
]);