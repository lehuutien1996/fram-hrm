<?php

namespace App\Repositories\Contracts;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

interface EmployeeRepositoryInterface
{
    public function save(array $treeData): Model|Employee;
}
