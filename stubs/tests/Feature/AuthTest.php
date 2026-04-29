<?php

use App\Models\User;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\actingAs;

it('renders the login page', function () {
    get('/login')->assertStatus(200);
});

it('can authenticate a user', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password123'),
    ]);

    $component = Livewire\Livewire::test('app.livewire.auth.login')
        ->set('email', $user->email)
        ->set('password', 'password123')
        ->call('login');

    $component->assertRedirect('/dashboard');
    $this->assertAuthenticatedAs($user);
});

it('renders the register page', function () {
    get('/register')->assertStatus(200);
});

it('can register a new user', function () {
    $component = Livewire\Livewire::test('app.livewire.auth.register')
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->set('password', 'password123')
        ->set('password_confirmation', 'password123')
        ->call('register');

    $component->assertRedirect('/dashboard');
    $this->assertDatabaseHas('users', [
        'email' => 'test@example.com',
    ]);
});
