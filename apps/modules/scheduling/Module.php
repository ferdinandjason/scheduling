<?php

namespace Siakad\Scheduling;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Siakad\Scheduling\Domain\Model' => __DIR__ . '/domain/model',
            'Siakad\Scheduling\Domain\Response' => __DIR__ . '/domain/response',
            'Siakad\Scheduling\Infrastructure' => __DIR__ . '/infrastructure',
            'Siakad\Scheduling\Application' => __DIR__ . '/application',
            'Siakad\Scheduling\Controllers\Web' => __DIR__ . '/controllers/web',
            'Siakad\Scheduling\Controllers\Api' => __DIR__ . '/controllers/api',
            'Siakad\Scheduling\Controllers\Validators' => __DIR__ . '/controllers/validators',
            'Siakad\Scheduling\Domain\Exception' => __DIR__ . '/domain/exception',
        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once  __DIR__ . '/config/services.php';
    }
}