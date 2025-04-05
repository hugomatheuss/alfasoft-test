<?php

namespace Tests\Feature;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ContactFormValidationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    /** @test */
    public function it_shows_validation_errors_when_adding_a_contact_with_invalid_data()
    {
        $user = User::create([
            'name' => 'Hugo Matheus',
            'email' => 'hugo@email.com',
            'password' => Hash::make('123'),
        ]);
    
        $this->actingAs($user);

        $response = $this->withoutMiddleware([VerifyCsrfToken::class])->post(route('contacts.store'), [
            'name' => '',
            'email' => 'invalid-email',
            'contact' => '123',
        ]);

        $response->assertSessionHasErrors([
            'name',
            'email',
            'contact',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function it_shows_validation_errors_when_editing_a_contact_with_invalid_data()
    {
        $user = User::create([
            'name' => 'Hugo Matheus',
            'email' => 'hugo@email.com',
            'password' => Hash::make('123'),
        ]);
    
        $this->actingAs($user);

        $contact = Contact::factory()->create();

        $response = $this->withoutMiddleware([VerifyCsrfToken::class])->put(route('contacts.update', $contact->id), [
            'name' => 'A',
            'email' => 'invalid-email',
            'contact' => '',
        ]);

        $response->assertSessionHasErrors([
            'name',
            'email',
            'contact',
        ]);
    }
}
