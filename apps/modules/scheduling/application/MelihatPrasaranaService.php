<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\PrasaranaRepository;

class MelihatPrasaranaService
{
    private $prasaranaRepository;

    public function __construct(PrasaranaRepository $prasaranaRepository)
    {
        $this->prasaranaRepository = $prasaranaRepository;
    }

    public function execute()
    {
        return new MelihatPrasaranaResponse($this->prasaranaRepository->all());
    }
}