<div class="max-w-2xl w-full mx-auto py-6">
    <header class="flex items-center gap-4 mb-6">
        <x-button href="{{ route('admin.user.index') }}" wire:navigate variant="ghost" size="icon-sm" class="rounded-full">
            <x-icon name="chevron-left" class="size-5" />
        </x-button>
        <h1 class="text-lg lg:text-xl font-semibold">{{ $user && $user->exists ? __('Edit User') : __('Create User') }}</h1>
    </header>

    <div class="border bg-card text-card-foreground rounded-3xl shadow-sm p-6">
        <form wire:submit.prevent="save" class="space-y-4">
            <div class="space-y-1.5">
                <label for="name" class="text-sm font-medium text-foreground">{{ __('Name') }}</label>
                <x-input wire:model="name" id="name" type="text" placeholder="{{ __('Enter name') }}" />
                @error('name') <span class="text-xs text-destructive">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-1.5">
                <label for="email" class="text-sm font-medium text-foreground">{{ __('Email') }}</label>
                <x-input wire:model="email" id="email" type="email" placeholder="{{ __('Enter email') }}" />
                @error('email') <span class="text-xs text-destructive">{{ $message }}</span> @enderror
            </div>

            <div class="pt-2 flex justify-end">
                <x-button type="submit" variant="primary" size="sm">
                    {{ __('Save Changes') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
