<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Response\MessageResponse;

class MengelolaPeriodeSemesterResponse extends MessageResponse
{
    public function __construct($message = null)
    {
        parent::__construct($message);
    }
}