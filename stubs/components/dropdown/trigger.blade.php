<div x-ref="trigger" @click="open = !open" {{ $attributes->merge(['class' => 'cursor-pointer']) }}>
    {{ $slot }}
</div>
