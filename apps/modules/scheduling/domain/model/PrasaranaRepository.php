<?php

namespace Siakad\Scheduling\Domain\Model;

interface PrasaranaRepository
{
    public function all();
    public function byId($id);
}