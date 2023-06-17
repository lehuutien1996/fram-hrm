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

    public function flattenWithChildrenAdded(array $items, array $payload): array
    {
        return array_map(fn($item) => [
            'name' => $item,
            'parent' => $payload[$item] ?? null,
            'children' => [],
        ], $items);
    }

    public function nesting(array $flattenData): array
    {
        // TODO: Implement nesting() method.
    }
}
