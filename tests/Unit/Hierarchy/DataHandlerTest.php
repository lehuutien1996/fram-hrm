<?php

namespace Tests\Unit\Hierarchy;

use App\Services\Hierarchy\DataHandler;
use PHPUnit\Framework\TestCase;

class DataHandlerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_flatten_with_unique_function(): void
    {
        // a, b, c, d
        $payload = [
            'a' => 'b',
            'b' => 'c',
            'c' => 'd',
            'd' => 'a',
        ];

        $handler = new DataHandler();
        $result = $handler->flattenThenUnique($payload);

        $this->assertCount(4, $result);
        $this->assertEmpty(array_diff(
            ['a', 'b', 'c', 'd'],
            $result
        ));
    }
}
