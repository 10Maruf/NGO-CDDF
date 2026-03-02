<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    // ─────────────────────────────────────────────
    // Test 1: Login page loads
    // ─────────────────────────────────────────────
    public function test_login_page_loads_successfully()
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    // ─────────────────────────────────────────────
    // Test 2: Successful login with valid credentials
    // ─────────────────────────────────────────────
    public function test_user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'email'    => 'admin@test.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/admin/login', [
            'email'    => 'admin@test.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/admin/home');
        $this->assertAuthenticatedAs($user);
    }

    // ─────────────────────────────────────────────
    // Test 3: Login fails with wrong password
    // ─────────────────────────────────────────────
    public function test_user_cannot_login_with_wrong_password()
    {
        User::factory()->create([
            'email'    => 'admin@test.com',
            'password' => Hash::make('correctpassword'),
        ]);

        $response = $this->post('/admin/login', [
            'email'    => 'admin@test.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    // ─────────────────────────────────────────────
    // Test 4: Login fails with non-existent email
    // ─────────────────────────────────────────────
    public function test_user_cannot_login_with_nonexistent_email()
    {
        $response = $this->post('/admin/login', [
            'email'    => 'ghost@noexist.com',
            'password' => 'anypassword',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    // ─────────────────────────────────────────────
    // Test 5: Login validation – email required
    // ─────────────────────────────────────────────
    public function test_login_requires_email_field()
    {
        $response = $this->post('/admin/login', [
            'email'    => '',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    // ─────────────────────────────────────────────
    // Test 6: Login validation – password required
    // ─────────────────────────────────────────────
    public function test_login_requires_password_field()
    {
        $response = $this->post('/admin/login', [
            'email'    => 'admin@test.com',
            'password' => '',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    // ─────────────────────────────────────────────
    // Test 7: Login validation – email format
    // ─────────────────────────────────────────────
    public function test_login_requires_valid_email_format()
    {
        $response = $this->post('/admin/login', [
            'email'    => 'this-is-not-an-email',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    // ─────────────────────────────────────────────
    // Test 8: Logged-in user visiting login page is redirected
    // ─────────────────────────────────────────────
    public function test_authenticated_user_is_redirected_away_from_login()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/login');

        // guest middleware redirects to /home which shims to /admin/home
        $response->assertRedirect();
    }

    // ─────────────────────────────────────────────
    // Test 9: Unauthenticated user cannot access admin home
    // ─────────────────────────────────────────────
    public function test_unauthenticated_user_cannot_access_admin_home()
    {
        $response = $this->get('/admin/home');

        $response->assertRedirect('/admin/login');
    }

    // ─────────────────────────────────────────────
    // Test 10: Remember me – cookie is set
    // ─────────────────────────────────────────────
    public function test_user_can_login_with_remember_me()
    {
        $user = User::factory()->create([
            'email'    => 'admin@test.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/admin/login', [
            'email'    => 'admin@test.com',
            'password' => 'password123',
            'remember' => '1',
        ]);

        $response->assertRedirect('/admin/home');
        $this->assertAuthenticatedAs($user);

        // Laravel sets a remember_web_* cookie when remember=1
        $cookieSet = collect($response->headers->getCookies())
            ->contains(fn($c) => str_starts_with($c->getName(), 'remember_web_'));

        $this->assertTrue($cookieSet, 'Remember-me cookie was not set.');
    }

    // ─────────────────────────────────────────────
    // Test 11: Logout clears session and redirects
    // ─────────────────────────────────────────────
    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/admin/logout');

        $response->assertRedirect('/admin/login');
        $this->assertGuest();
    }

    // ─────────────────────────────────────────────
    // Test 12: Rate limiting after too many attempts
    // ─────────────────────────────────────────────
    public function test_login_is_rate_limited_after_too_many_attempts()
    {
        // Laravel throttles after 5 failed attempts by default
        for ($i = 0; $i < 5; $i++) {
            $this->post('/admin/login', [
                'email'    => 'admin@test.com',
                'password' => 'wrongpassword' . $i,
            ]);
        }

        $response = $this->post('/admin/login', [
            'email'    => 'admin@test.com',
            'password' => 'wrongpassword',
        ]);

        // After throttle: session has 'email' error containing throttle message
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
