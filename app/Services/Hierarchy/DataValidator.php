<?php

namespace App\Services\Hierarchy;

use App\Concerns\Hierarchy\ValidatorInterface;
use App\Exceptions\ApplicationException;
use Illuminate\Support\Collection;

class DataValidator implements ValidatorInterface
{
    /**
     * @throws ApplicationException
     */
    public function validate(array $flattenData): bool
    {
        $collection = collect($flattenData);

        $this->verifyMultipleRoots($collection);
        $this->verifyLoop($collection);
    }

    /**
     * @throws ApplicationException
     */
    private function verifyMultipleRoots(Collection $collection)
    {
        $rootCount = $collection
            ->pluck('parent')
            ->filter(fn($item) => is_null($item))
            ->count();

        if ($rootCount > 1) {
            throw new ApplicationException('Invalid payload due to having multiple roots');
        }
    }

    /**
     * @throws ApplicationException
     */
    private function verifyLoop(Collection $collection)
    {
        $loopCount = $collection
            ->filter(fn($value, $key) => (
                $key == $collection[$value] &&
                $value == $collection[$key]
            ))
            ->count();

        if ($loopCount > 1) {
            throw new ApplicationException('Invalid payload due to having a loop inside');
        }
    }
}
