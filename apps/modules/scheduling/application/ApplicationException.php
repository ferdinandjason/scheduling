<?php

namespace Siakad\Scheduling\Application;

class ApplicationException {
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function hasMessage()
    {
        return $this->message != null;
    }
}