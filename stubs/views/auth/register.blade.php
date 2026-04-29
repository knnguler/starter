<div class="max-w-sm w-full m-auto">
    <div
        class="flex flex-col gap-4 border bg-card text-card-foreground rounded-4xl px-6 lg:px-8 py-14 shadow-2xs">
        <a href="{{url('/')}}" wire:navigate
           class="inline-flex mx-auto [&_svg]:h-12 text-foreground hover:opacity-60">
            <x-logo.icon/>
        </a>
        <h1 class="block text-2xl font-semibold text-accent-foreground text-center">{{__('Create account')}}</h1>
        <x-button class="w-full rounded-full" type="button" variant="secondary" href="">
            <svg fill="currentColor" viewBox="0 0 24 24" class="size-4" aria-hidden="true">
                <path
                    d="M3.06364 7.50914C4.70909 4.24092 8.09084 2 12 2C14.6954 2 16.959 2.99095 18.6909 4.60455L15.8227 7.47274C14.7864 6.48185 13.4681 5.97727 12 5.97727C9.39542 5.97727 7.19084 7.73637 6.40455 10.1C6.2045 10.7 6.09086 11.3409 6.09086 12C6.09086 12.6591 6.2045 13.3 6.40455 13.9C7.19084 16.2636 9.39542 18.0227 12 18.0227C13.3454 18.0227 14.4909 17.6682 15.3864 17.0682C16.4454 16.3591 17.15 15.3 17.3818 14.05H12V10.1818H21.4181C21.5364 10.8363 21.6 11.5182 21.6 12.2273C21.6 15.2727 20.5091 17.8363 18.6181 19.5773C16.9636 21.1046 14.7 22 12 22C8.09084 22 4.70909 19.7591 3.06364 16.4909C2.38638 15.1409 2 13.6136 2 12C2 10.3864 2.38638 8.85911 3.06364 7.50914Z"></path>
            </svg>
            {{ __('Continue with Google') }}
        </x-button>
        <div
            class="mx-3 flex items-center text-xs text-white/30 before:flex-1 before:border-t before:border-secondary/50 before:me-6 after:flex-1 after:border-t after:border-secondary/50 after:ms-6">{{__('OR')}}</div>
        <form wire:submit="register" class="flex flex-col gap-4">
            <div class="flex flex-col gap-3">
                <x-label class="sr-only" for="name" :value="__('Name')"/>
                <x-input wire:model="name" id="name" type="text" name="name" :value="old('name')" class="rounded-full"
                         required autofocus autocomplete="name" placeholder="{{__('Name')}}"/>
                <x-error.livewire name="name"/>
            </div>
            <div class="flex flex-col gap-3">
                <x-label class="sr-only" for="email" :value="__('Email')"/>
                <x-input wire:model="email" id="email" type="email" name="email" :value="old('email')"
                         class="rounded-full"
                         required autofocus autocomplete="username" placeholder="{{__('Email')}}"/>
                <x-error.livewire name="email"/>
            </div>

            <div class="flex flex-col gap-3">
                <x-label class="sr-only" for="password" :value="__('Password')"/>
                <x-input wire:model="password" id="password" type="password" name="password" :value="old('password')"
                         class="rounded-full"
                         required autofocus autocomplete="password" placeholder="{{__('Password')}}"/>
                <x-error.livewire name="password"/>
            </div>

            <div class="flex items-center justify-end">
                <x-button type="submit" variant="default" class="w-full rounded-full">
                    {{ __('Create account') }}
                </x-button>
            </div>
        </form>
        <div class="text-center">
            <div class="space-x-1 text-center text-sm text-muted-foreground">
                {{__('Already have an account ?')}}
                <a href="{{ route('login') }}" wire:navigate
                   class="text-primary hover:underline font-medium">{{__('Login')}}</a>
            </div>

            @if (Route::has('password.request'))
                <a class="text-sm text-muted-foreground hover:underline inline-block mt-2"
                   href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password ?') }}
                </a>
            @endif
        </div>
    </div>
</div>
