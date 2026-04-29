<div class="flex flex-col gap-5 max-w-sm m-auto w-full relative py-10 lg:py-24">
    <h2 class="block text-2xl font-semibold text-accent-foreground text-center mb-3">{{__('Confirm password')}}</h2>

    <form wire:submit="confirmPassword" class="flex flex-col gap-5">
        <div class="flex flex-col gap-3">
            <x-label class="sr-only" for="password" :value="__('Email')"/>
            <x-input wire:model="password" id="password" type="password" name="password" :value="old('password')"
                     class="!rounded-full !px-5"
                     required autofocus autocomplete="new-password" placeholder="{{__('Password')}}"/>
            <x-error.livewire name="password"/>
        </div>
        <div class="flex items-center justify-end">
            <x-button type="submit" variant="primary" class="w-full !rounded-full">
                {{ __('Confirm') }}
            </x-button>
        </div>
    </form>
</div>
