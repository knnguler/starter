@props(['class' => ''])

<ul
    x-show="submenuOpen && $data.state === 'expanded'"
    data-slot="sidebar-menu-sub"
    data-sidebar="menu-sub"
    class="relative before:absolute before:left-4.5 before:top-0 before:bottom-8 before:w-[2px] before:bg-muted flex min-w-0 translate-x-px flex-col gap-1  pl-8  py-2  {{ $class }}"
>
    {{ $slot }}
</ul>
