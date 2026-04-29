<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPassword extends Component
{
    public string $email = '';
    public ?string $status = null;

    public function sendLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $result = Password::sendResetLink(['email' => $this->email]);

        if ($result === Password::RESET_LINK_SENT) {
            $this->status = __($result);
            return;
        }

        $this->addError('email', __($result));
    }

    public function render()
    {
        return view('auth.forgot-password')->layout('layouts.app');
    }
}
