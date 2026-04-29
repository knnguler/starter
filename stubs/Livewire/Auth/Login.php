<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function login(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $key = 'login:' . Str::lower($this->email) . '|' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('email', __('Too many login attempts. Please try again in :seconds seconds.', ['seconds' => $seconds]));
            return;
        }

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($key, 60);
            $this->addError('email', __('These credentials do not match our records.'));
            return;
        }

        RateLimiter::clear($key);
        session()->regenerate();

        $this->redirectRoute('dashboard', navigate: true);
    }

    public $config = [
        'title' => 'Sign In to Your Account',
        'description' => 'Log in to Weflix to access your purchased scripts, manage your project quotes, and track our product roadmap.',
    ];

    public function render()
    {
        return view('auth.login')->layout('layouts.app', ['config' => $this->config]);
    }
}
