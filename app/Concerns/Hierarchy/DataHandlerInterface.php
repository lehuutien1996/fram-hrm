<?php

namespace App\Concerns\Hierarchy;

interface DataHandlerInterface
{
    public function flattenThenUnique(array $payload): array;
    public function flattenWithChildrenAdded(array $payload): array;
    public function nesting(array $flatData): array;
}
