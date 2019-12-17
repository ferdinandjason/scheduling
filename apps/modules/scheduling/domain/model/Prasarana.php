<?php

namespace Siakad\Scheduling\Domain\Model;

class Prasarana
{
    private $id;
    private $nama;

    public function __construct($id, $nama)
    {
        $this->id = $id;
        $this->nama = $nama;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNama()
    {
        return $this->nama;
    }

}