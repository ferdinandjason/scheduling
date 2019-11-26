<?php

return array(
    'scheduling' => [
        'namespace' => 'Siakad\Scheduling',
        'webControllerNamespace' => 'Siakad\Scheduling\Controllers\Web',
        'apiControllerNamespace' => 'Siakad\Scheduling\Controllers\Api',
        'className' => 'Siakad\Scheduling\Module',
        'path' => APP_PATH . '/modules/Scheduling/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'scheduling',
        'defaultAction' => 'index'
    ]

);