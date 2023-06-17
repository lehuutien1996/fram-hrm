<?php

namespace App\Services;

use App\Concerns\Hierarchy\DataHandlerInterface;
use App\Concerns\Hierarchy\ValidatorInterface;
use App\Repositories\Contracts\EmployeeRepositoryInterface;

class SaveHierarchy
{
    public function __construct(
        private readonly ValidatorInterface $validator,
        private readonly DataHandlerInterface $dataHandler,
        private readonly EmployeeRepositoryInterface $repository,
    ) {}

    public function handle($payload)
    {
        $names = $this->dataHandler->flattenThenUnique($payload);
        $flattenData = $this->dataHandler->flattenWithChildrenAdded($names, $payload);

        // Validate flatten data
        $this->validator->validate($flattenData);


    }
}
