<button @click="openSub = !openSub"
    x-ref="subTrigger"
    x-on:mouseover="$el.focus()"
    x-on:mouseleave="$el.blur()"
    {{ $attributes->merge(['class' => 'flex w-full items-center px-4 py-2 text-sm cursor-pointer focus:bg-accent focus:text-accent-foreground hover:bg-accent hover:text-accent-foreground outline-none disabled:pointer-events-none disabled:opacity-50']) }}>
    {{ $slot }}
    <svg class="ml-auto w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
    </svg>
</button>
