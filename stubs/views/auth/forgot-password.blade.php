<div class="max-w-sm w-full m-auto">
    <div
        class="flex flex-col gap-4 border bg-card text-card-foreground rounded-4xl px-6 lg:px-8 py-14 shadow-2xs">
        <a href="{{url('/')}}" wire:navigate
           class="inline-flex mx-auto [&_svg]:h-12 text-foreground hover:opacity-60">
            <x-logo.icon/>
        </a>
        <h1 class="block text-2xl font-semibold text-accent-foreground text-center">{{__('Forgot your password ?')}}</h1>

    <form wire:submit="sendLink" class="flex flex-col gap-5">
        <div class="flex flex-col gap-3">
            <x-label class="sr-only" for="email" :value="__('Email')"/>
            <x-input wire:model="email" id="email" type="email" name="email" :value="old('email')"
                     class="rounded-full"
                     required autofocus autocomplete="username" placeholder="{{__('Email')}}"/>
            <x-error.livewire name="email"/>
        </div>
        <div class="flex items-center justify-end">
            <x-button type="submit" variant="primary" class="w-full !rounded-full">
                {{ __('Email password reset link') }}
            </x-button>
        </div>
    </form>
        <div class="text-center">
            <div class="space-x-1 text-center text-sm text-muted-foreground">
                {{__('Already have an account ?')}}
                <a href="{{ route('login') }}" wire:navigate
                   class="text-primary hover:underline font-medium">{{__('Login')}}</a>
            </div>
        </div>
    </div>
</div>
