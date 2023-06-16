<?php

namespace App\Services;

use App\Concerns\Hierarchy\DataHandlerInterface;
use App\Concerns\Hierarchy\ValidatorInterface;
use App\Repositories\Contracts\EmployeeRepositoryInterface;

class SaveHierarchy
{
    protected ValidatorInterface $validator;

    protected DataHandlerInterface $dataHandler;

    protected EmployeeRepositoryInterface $repository;

    public function handle($payload)
    {
        $this->validator->validate($payload);


    }
}
