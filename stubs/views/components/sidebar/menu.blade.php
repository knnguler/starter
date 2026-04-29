@props(['class' => ''])

<ul
    data-slot="sidebar-menu"
    data-sidebar="menu"
    class="flex w-full min-w-0 flex-col gap-0.5 {{ $class }}"
    x-bind:class="{
        'items-center': $data.state === 'collapsed',
    }"
>
    {{ $slot }}
</ul>
