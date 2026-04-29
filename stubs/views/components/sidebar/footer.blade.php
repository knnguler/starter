@props(['class' => ''])

<div
    data-slot="sidebar-footer"
    data-sidebar="footer"
    class="flex flex-col gap-2 px-3 pb-4 {{ $class }}"
>
    {{ $slot }}
</div>
