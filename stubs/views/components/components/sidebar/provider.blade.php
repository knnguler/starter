@props([
    'defaultOpen' => true,
    'side' => 'left',
    'variant' => 'sidebar',
    'collapsible' => 'offcanvas',
    'class' => '',
])

@php
    $side = in_array($side, ['left', 'right']) ? $side : 'left';
    $variant = in_array($variant, ['sidebar', 'floating', 'inset']) ? $variant : 'sidebar';
    $collapsible = in_array($collapsible, ['offcanvas', 'icon', 'none']) ? $collapsible : 'offcanvas';
@endphp

<div
    x-data="{
        open: {{ $defaultOpen ? 'true' : 'false' }},
        openMobile: false,
        isTablet: window.innerWidth >= 768,

        get state() {
            if (!this.isTablet) return 'expanded'
            return this.open ? 'expanded' : 'collapsed'
        },

        toggleSidebar() {
            if (!this.isTablet) {
                this.openMobile = !this.openMobile
            } else {
                this.open = !this.open
            }
        }
    }"
    x-init="
        (() => {
            const match = document.cookie.match(/(?:^|; )sidebar_state=([^;]*)/);
            if (match) {
                const val = match[1];
                open = (val === 'true' || val === '1');
            }
        })()
    "
    x-effect="document.cookie = 'sidebar_state=' + (open ? '1' : '0') + '; path=/; max-age=604800';"
    x-on:resize.window.debounce.150ms="
        isTablet = window.innerWidth >= 768;

        if (isTablet) {
            openMobile = false;
        }
    "
    x-on:keydown.window="
        (($event.key === 'b' || $event.key === 'B') && ($event.metaKey || $event.ctrlKey)) ? ($event.preventDefault(), toggleSidebar()) : null
    "
    data-slot="sidebar-wrapper"
    x-bind:data-state="state"
    data-side="{{ $side }}"
    data-variant="{{ $variant }}"
    data-collapsible="{{ $collapsible }}"
    class="group/sidebar-wrapper flex min-h-svh w-full [--sidebar-width-icon:calc(--spacing(16))] [--sidebar-width:calc(--spacing(56))] {{ $variant === 'inset' ? 'bg-sidebar' : '' }} {{ $class }}"
>
    {{ $slot }}
</div>
