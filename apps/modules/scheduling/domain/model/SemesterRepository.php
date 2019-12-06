<?php

namespace Siakad\Scheduling\Domain\Model;

interface SemesterRepository
{
    public function all();
    public function byId($id);
    public function save(Semester $periodeSemester);
    public function delete($id);
}