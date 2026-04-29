<div class="flex flex-col gap-5 max-w-sm m-auto w-full relative py-10 lg:py-24">
    <h2 class="block text-2xl font-semibold text-accent-foreground text-center mb-3">{{__('Reset password')}}</h2>

    <form wire:submit="resetPassword" class="flex flex-col gap-5">
        <div class="flex flex-col gap-3">
            <x-label class="sr-only" for="email" :value="__('Email')"/>
            <x-input wire:model="email" id="email" type="email" name="email" :value="old('email')" class="rounded-full"
                     required autofocus autocomplete="email" placeholder="{{__('Email')}}"/>
            <x-error.livewire name="email"/>
        </div>
        <div class="flex flex-col gap-3">
            <x-label class="sr-only" for="password" :value="__('Password')"/>
            <x-input wire:model="password" id="password" type="password" name="password" :value="old('password')" class="rounded-full"
                     required autofocus autocomplete="password" placeholder="{{__('Password')}}"/>
            <x-error.livewire name="password"/>
        </div>
        <div class="flex flex-col gap-3">
            <x-label class="sr-only" for="password_confirmation" :value="__('Password')"/>
            <x-input wire:model="password_confirmation" id="password_confirmation" type="password" name="password_confirmation" :value="old('password_confirmation')" class="rounded-full"
                     required autofocus autocomplete="password_confirmation" placeholder="{{__('Confirm password')}}"/>
            <x-error.livewire name="password_confirmation"/>
        </div>
        <div class="flex items-center justify-end">
            <x-button type="submit" variant="primary" class="w-full !rounded-full">
                {{ __('Reset password') }}
            </x-button>
        </div>
    </form>
</div>
