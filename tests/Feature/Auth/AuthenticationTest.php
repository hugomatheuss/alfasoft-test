<?php

namespace Tests\Feature\Auth;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::create([
            'name' => 'Hugo Matheus',
            'email' => 'hugo@email.com',
            'password' => Hash::make('123'),
        ]);

        $response = $this->withoutMiddleware([VerifyCsrfToken::class])->post('/login', [
            'email' => $user->email,
            'password' => '123',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::CONTACTS);
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::create([
            'name' => 'Hugo Matheus',
            'email' => 'hugo@email.com',
            'password' => Hash::make('123'),
        ]);

        $response = $this->actingAs($user)->withoutMiddleware([VerifyCsrfToken::class])->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/login');
    }
}
