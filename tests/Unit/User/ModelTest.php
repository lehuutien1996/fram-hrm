<?php

namespace Tests\Unit\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ModelTest extends TestCase
{
    public function test_password_setter(): void
    {
        $user = new User();
        $user->password = 'secret';

        $this->assertNotEquals('secret', $user->password);
        $this->assertTrue(Hash::check('secret', $user->password));
    }
}
