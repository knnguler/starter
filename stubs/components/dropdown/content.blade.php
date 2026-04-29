<template x-teleport="body" >
<div
    {{ $attributes->twMerge(['class' => 'absolute z-50 z-50 min-w-[8rem] rounded-2xl border border-input/30 bg-card px-1.5 py-3 text-secondary-foreground shadow-sm
    data-[state=open]:animate-in
    data-[state=closed]:animate-out
    data-[state=closed]:fade-out-0
    data-[state=open]:fade-in-0
    data-[state=closed]:zoom-out-95
    data-[state=open]:zoom-in-95
    data-[side=bottom]:slide-in-from-top-2
    data-[side=left]:slide-in-from-right-2
    data-[side=right]:slide-in-from-left-2
    data-[side=top]:slide-in-from-bottom-2
    w-56']) }}
    x-show="open"
    x-ref="content"
    x-trap="open"
    @keydown.up.prevent="$focus.wrap().previous()"
    @keydown.down.prevent="$focus.wrap().next()"
    @click.outside="open = false"
    x-anchor.bottom-center.offset.10="$refs.trigger"
    x-cloak
    :data-state="open ? 'open' : 'closed'"
    :data-side="$refs.trigger.offsetTop < $anchor.y ? 'bottom' : 'top'"
    >
    {{ $slot }}
</div>
</template>
