@props(['label' => 'Resim Seç', 'preview' => null])

<div x-data="{
        preview: @js($preview),
        loading: false,
        isDropping: false,
        handleFile(event) {
            const file = event.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = (e) => { this.preview = e.target.result; };
            reader.readAsDataURL(file);
        },
    }"
>
    <div {{ $attributes->whereDoesntStartWith('wire:model')->twMerge(['class' => 'relative group w-full h-full']) }}>
        <input type="file" x-ref="fileInput" @change="handleFile" {{ $attributes->wire('model') }} class="hidden"
               accept="image/*">
        <div @click="$refs.fileInput.click()"
             @dragover.prevent="isDropping = true"
             @dragleave.prevent="isDropping = false"
             @drop.prevent="isDropping = false; $refs.fileInput.files = $event.dataTransfer.files; handleFile({ target: $refs.fileInput }); $refs.fileInput.dispatchEvent(new Event('change'));"
             :class="{'border-border!': preview!}"
             class="relative flex flex-col items-center justify-center w-full h-full cursor-pointer transition-all hover:text-accent-foreground overflow-hidden bg-muted dark:bg-input/30 text-card-foreground rounded-2xl border border-border/50 shadow-xs">

            <div wire:loading.flex wire:target="{{ $attributes->wire('model')->value() }}"
                 class="absolute inset-0 z-20 flex items-center justify-center bg-background bg-opacity-75">
                <svg class="animate-spin size-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
            <div x-show="loading"
                 class="absolute inset-0 z-20 flex items-center justify-center bg-background bg-opacity-75">
                <svg class="animate-spin size-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>

            <template x-if="preview">
                <img :src="preview" class="w-full h-full object-cover" alt="Image Preview">
            </template>

            <template x-if="!preview">
                @if($slot->isNotEmpty())
                    {{ $slot }}
                @else
                    <div class="text-center w-1/3">
                        <x-icon name="plus" class="size-full"/>
                    </div>
                @endif
            </template>
        </div>

        <template x-if="preview">
            <button type="button"
                    @click.stop="preview = null; $refs.fileInput.value = null; @this.set('{{ $attributes->wire('model')->value() }}', null)"
                    class="absolute top-3 right-3 bg-white text-red-500 rounded-full p-1 border hover:bg-red-50 z-10 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </template>
    </div>

    @error($attributes->wire('model')->value())
    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
    @enderror
</div>
