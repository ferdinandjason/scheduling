<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Response\MessageResponse;

class MengelolaPeriodeKuliahResponse extends MessageResponse
{
    public function __construct($message = null)
    {
        parent::__construct($message);
    }
}