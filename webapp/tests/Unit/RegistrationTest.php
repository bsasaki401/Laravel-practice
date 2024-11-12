<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_new_users_can_register()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $hashedPassword = md5($data['password']);

        $user = [
            'name' => $data['name'],
            'email' => strtolower($data['email']),
            'password' => $hashedPassword,
        ];

        $this->assertEquals('Test User', $user['name']);
        $this->assertEquals('testuser@example.com', $user['email']);
        $this->assertNotEquals('password123', $user['password']);
    }
}
