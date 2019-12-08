<?php

namespace Siakad\Scheduling\Domain\Response;

class MessageResponse
{
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