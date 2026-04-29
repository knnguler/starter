@props(['modal', 'title', 'id' => null, 'width'])

@php
    $width = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        '3xl' => 'sm:max-w-3xl',
        '5xl' => 'sm:max-w-5xl',
        '7xl' => 'sm:max-w-7xl',
    ][$width ?? 'lg'];
@endphp
<div x-data="{ show : false , modal : '{{ $modal }}' }"
     x-show="show" x-trap.inert.noscroll="show" x-on:keydown.esc.window="show = false" x-on:click.self="show = false"
     x-on:open-modal.window="show = ($event.detail.modal === modal)"
     x-on:close-modal.window="show = false"
     x-on:keydown.escape.window="show = false" class="fixed z-50 inset-0">

    <div x-show="show" class="fixed inset-0 bg-black/30 dark:bg-background/50 backdrop-blur-sm"
         x-on:click="show = false"></div>

    <div class="relative flex h-full max-h-full lg:items-center justify-center">
        <div class="relative w-full {{ $width }} overflow-y-auto rounded-3xl bg-background dark:bg-card">
            @isset($title)
                <div class="flex items-center justify-between px-5 lg:px-8 py-4">
                    <h3 class="font-display font-semibold text-xl text-accent-foreground leading-6" id="modal-title">
                        {{ $title }}
                    </h3>
                    <x-button variant="ghost" type="button" size="icon" x-on:click="$dispatch('close-modal')"
                              class="rounded-full! -mr-2" tabindex="-1">
                        <x-icon name="close" class="size-5" size="icon"/>
                    </x-button>
                </div>
            @else
                <div class="flex items-center justify-end px-5 lg:px-8 py-4">
                    <div class="">
                        <x-button variant="ghost" type="button" size="icon" x-on:click="$dispatch('close-modal')"
                                  class="rounded-full -mr-2" tabindex="-1">
                            <x-icon name="close" class="size-5" size="icon"/>
                        </x-button>
                    </div>
                </div>
            @endif
            <div class="px-5 lg:px-8 pb-5 lg:pb-8">{{ $body }}</div>
        </div>
    </div>
</div>
