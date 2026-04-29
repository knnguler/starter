@props([
    'class' => '',
])

<button
    type="button"
    data-slot="sidebar-trigger"
    data-sidebar="trigger"
    class="inline-flex items-center justify-center rounded-xl border border-transparent bg-transparent hover:bg-sidebar-accent hover:text-sidebar-accent-foreground text-accent-foreground size-9 text-sm shadow-xs transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 cursor-pointer {{ $class }}"
    @click="toggleSidebar()"
>
    <x-icon name="collapse" class="size-4" />
    <span class="sr-only">Toggle Sidebar</span>
</button>
