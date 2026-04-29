@props([
    'active' => false,
    'class' => '',
])

@php
    $base = 'w-full ring-sidebar-ring rounded-xl flex h-8 min-w-0 items-center gap-2 px-3
                             relative before:w-2 before:border-l-2 before:border-b-2 before:rounded-bl-2xl
                             before:border-muted before:absolute before:-left-3.5 before:top-0 before:bottom-3.5 text-secondary-foreground/70 dark:text-secondary-foreground/60 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground dark:hover:text-sidebar-accent-foreground cursor-pointer';
@endphp

<a
    data-slot="sidebar-menu-sub-button"
    data-sidebar="menu-sub-button"
    data-active="{{ $active ? 'true' : 'false' }}"
    {{ $attributes }}
    class="{{ $base }} {{ $active ? 'bg-sidebar-accent text-sidebar-accent-foreground font-medium' : '' }} {{ $class }}"
>
    {{ $slot }}
</a>
