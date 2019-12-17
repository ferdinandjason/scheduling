<?php

namespace Siakad\Scheduling\Application;

use Exception;

class ApplicationException extends Exception {
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