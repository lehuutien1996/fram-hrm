<?php

namespace Tests\Unit\Hierarchy;

use App\Services\Hierarchy\DataHandler;
use PHPUnit\Framework\TestCase;

class DataHandlerTest extends TestCase
{
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

    public function test_flatten_with_children_added(): void
    {
        /**
         * a
         *  -> b
         *      -> c
         *      -> d
         */
        $items = ['a', 'b', 'c', 'd'];
        $payload = [
            'b' => 'a',
            'c' => 'b',
            'd' => 'b',
        ];

        $handler = new DataHandler();
        $result = $handler->flattenWithChildrenAdded($items, $payload);

        foreach ($result as $member) {
            // Make sure children field added
            $this->assertArrayHasKey('children', $member);
            $this->assertEmpty($member['children']);

            // Verify the name and parent fields exists
            $this->assertArrayHasKey('name', $member);
            $this->assertArrayHasKey('parent', $member);

            $expectedParent = match($member['name']) {
                'a' => null,
                'b' => 'a',
                'c', 'd' => 'b',
            };
            $this->assertEquals($expectedParent, $member['parent']);
        }
    }
}
