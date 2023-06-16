<?php

namespace App\Concerns\Hierarchy;

interface ValidatorInterface
{
    public function validate(array $payload): bool;
}
