<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Response\MessageResponse;

class MelihatPeriodeSemesterResponse extends MessageResponse
{
    public $data;

    public function __construct($data, $message)
    {
        parent::__construct($message);
        $this->data = $data;
    }

}