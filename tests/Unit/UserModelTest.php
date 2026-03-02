<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    // ─────────────────────────────────────────────
    // Test 13: Password is stored as a bcrypt hash
    // ─────────────────────────────────────────────
    public function test_user_password_is_hashed_in_database()
    {
        $plainPassword = 'mysecretpassword';

        $user = User::factory()->create([
            'password' => Hash::make($plainPassword),
        ]);

        // Raw value in DB must NOT equal plain text
        $this->assertNotEquals($plainPassword, $user->password);

        // Hash::check must confirm it is the correct password
        $this->assertTrue(Hash::check($plainPassword, $user->password));
    }

    // ─────────────────────────────────────────────
    // Test 14: Only fillable fields are mass-assignable
    // ─────────────────────────────────────────────
    public function test_user_model_fillable_fields()
    {
        $expectedFillable = ['name', 'email', 'password', 'is_admin'];

        $user = new User();

        $this->assertEquals($expectedFillable, $user->getFillable());
    }

    // ─────────────────────────────────────────────
    // Test 15: Sensitive fields are hidden from serialization
    // ─────────────────────────────────────────────
    public function test_user_password_and_remember_token_are_hidden()
    {
        $user = User::factory()->create();

        $array = $user->toArray();

        $this->assertArrayNotHasKey('password', $array);
        $this->assertArrayNotHasKey('remember_token', $array);
    }
}
