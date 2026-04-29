<div
    {{ $attributes->merge(['class' => 'relative']) }}
    x-data="{ openSub: false }"
    @keydown.right.prevent="openSub = true; $nextTick(() => $refs['subContent'].querySelector('button')?.focus());"
    @keydown.left.prevent="openSub = false; $nextTick(() => $refs['subTrigger'].focus());"
    @mouseenter="openSub = true"
    @mouseleave="openSub = false">
    {{ $slot }}
</div>
