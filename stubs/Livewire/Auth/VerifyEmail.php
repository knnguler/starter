<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Livewire\Component;

class VerifyEmail extends Component
{
    public ?string $status = null;

    public function resend(): void
    {
        $user = auth()->user();

        if (! $user) {
            $this->redirectRoute('login', navigate: true);
            return;
        }

        if ($user->hasVerifiedEmail()) {
            $this->redirectRoute('dashboard', navigate: true);
            return;
        }

        $user->sendEmailVerificationNotification();
        $this->status = 'Doğrulama e-postası yeniden gönderildi.';
    }

    public function render()
    {
        return view('auth.verify-email')->layout('layouts.app');
    }
}
