<?php

namespace App\Services\Hierarchy;

use App\Concerns\Hierarchy\DataHandlerInterface;

class DataHandler implements DataHandlerInterface
{
    public function flattenThenUnique(array $payload): array
    {
        $items = [
            ...array_keys($payload),
            ...array_values($payload),
        ];

        return array_unique($items);
    }

    public function flattenWithChildrenAdded(array $payload): array
    {
        // TODO: Implement flattenWithChildrenAdded() method.
    }

    public function nesting(array $flatData): array
    {
        // TODO: Implement nesting() method.
    }
}
