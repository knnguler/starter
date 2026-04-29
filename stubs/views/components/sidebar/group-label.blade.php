@props(['class' => ''])

<div
    data-slot="sidebar-group-label"
    data-sidebar="group-label"
    class="text-sidebar-foreground/70 ring-sidebar-ring flex h-8 shrink-0 items-center
    rounded-md px-3 text-xs outline-hidden transition-[margin,opacity] duration-200
    ease-linear focus-visible:ring-2 [&>svg]:size-4 [&>svg]:shrink-0 {{ $class }}"
    x-show="$data.state === 'expanded'"
>
    {{ $slot }}
</div>
