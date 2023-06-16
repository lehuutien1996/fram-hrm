<?php

namespace App\Concerns\Hierarchy;

interface DataHandlerInterface
{
    public function flattenThenUnique(array $payload): array;
    public function flattenWithChildrenAdded(array $items, array $payload): array;
    public function nesting(array $flatData): array;
}
