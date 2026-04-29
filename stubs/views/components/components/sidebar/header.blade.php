<div
    data-slot="sidebar-header"
    data-sidebar="header"
    {{ $attributes->twMerge([
        'flex items-center gap-2 h-(--header-height) px-5.5 group-data-[state=collapsed]:justify-center',
    ]) }}
>
    {{ $slot }}
</div>
