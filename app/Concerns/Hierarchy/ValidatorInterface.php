<?php

namespace App\Concerns\Hierarchy;

use App\Exceptions\ApplicationException;

interface ValidatorInterface
{
    /**
     * @throws ApplicationException
     */
    public function validate(array $flattenData): bool;
}
