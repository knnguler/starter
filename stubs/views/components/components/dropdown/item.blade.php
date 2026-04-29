<button
    {{ $attributes->merge(['class' => 'w-full flex items-center px-3 py-1.5 text-sm cursor-pointer focus:bg-secondary rounded-xl focus:text-accent-foreground outline-none disabled:pointer-events-none disabled:opacity-50']) }}
    type="button"
    @click="open = false"
    x-on:mouseover="$el.focus()"
    x-on:mouseleave="$el.blur()">
    {{ $slot }}
</button>
