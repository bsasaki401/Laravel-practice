<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\User;

class StoreTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $user = new User([
            'name' => 'test',
            'email' => '@test.com',
            'password' => 'testpass'
        ]);

        $this->assertEquals('test', $user->name);
        $this->assertEquals('@test.com', $user->email);
        $this->assertEquals('testpass', $user->password);
    }
}
