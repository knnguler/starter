<div class="flex flex-col gap-5 max-w-sm m-auto w-full relative py-10 lg:py-24">
    <div class="text-center text-sm text-accent-foreground">
        {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="font-medium text-center text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="flex flex-col items-center justify-between space-y-3">
        <x-button wire:click="sendVerification" variant="primary" class="w-full">
            {{ __('Resend verification email') }}
        </x-button>
        <x-button wire:click="logout" variant="ghost" type="submit">
            {{ __('Log out') }}
        </x-button>
    </div>
</div>
