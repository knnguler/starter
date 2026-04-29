@props(['class' => ''])

<main data-slot="sidebar-inset"
    class="bg-sidebar relative flex w-full flex-1 flex-col transition-[margin] duration-200 ease-linear {{ $class }} [grid-area:main]" data-ui-main=""
    x-bind:class="{
        'md:ml-[var(--sidebar-width)]': $data.state === 'expanded',
        'md:ml-[var(--sidebar-width-icon)]': $data.state === 'collapsed',
    }">
    {{ $slot }}
</main>
