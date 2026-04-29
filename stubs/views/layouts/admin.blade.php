<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ (isset($config['title']) ? __($config['title']) . ' - ' : '') . config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ asset('apple-touch-icon-60x60.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ asset('apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-128x128.png') }}" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ asset('mstile-144x144.png') }}" />
    <meta name="msapplication-square70x70logo" content="{{ asset('mstile-70x70.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ asset('mstile-150x150.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ asset('mstile-310x150.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ asset('mstile-310x310.png') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @livewireStyles
</head>
<body class="dark antialiased min-h-screen bg-sidebar text-foreground relative flex flex-col [--header-height:calc(--spacing(16))] lg:[--header-height:calc(--spacing(16))]" x-data x-cloak>

@if(!($hideSidebar ?? false))
<x-sidebar.provider :defaultOpen="true" collapsible="icon">
    <x-sidebar.sidebar variant="inset" collapsible="icon">
        <x-sidebar.header>
            <a href="" wire:navigate
               class="inline-flex items-center [&_svg]:h-6 text-foreground hover:opacity-60">
                <x-logo.icon/>
            </a>
        </x-sidebar.header>
        <x-sidebar.content>
            @foreach(config('navigation.admin') as $group)
                <x-sidebar.group>
                    @if(isset($group['label']))
                        <x-sidebar.group-label>
                            {{ __($group['label']) }}
                        </x-sidebar.group-label>
                    @endif
                    <x-sidebar.group-content>
                        <x-sidebar.menu>
                            @foreach($group['items'] ?? [] as $nav)
                                @if($nav['type'] == 'menu')
                                    <x-sidebar.menu-item>
                                        <x-sidebar.menu-button :href="!empty($nav['route']) && Route::has($nav['route']) ? route($nav['route']) : null"  wire:navigate tooltip="{{ __($nav['label']) }}">
                                            <x-slot:icon>
                                                <x-icon name="{{ $nav['icon'] ?? 'home' }}"/>
                                            </x-slot:icon>
                                            {{ __($nav['label']) }}
                                        </x-sidebar.menu-button>
                                    </x-sidebar.menu-item>
                                @elseif($nav['type'] == 'submenu')
                                    <x-sidebar.menu-item
                                        x-data="{ submenuOpen: false, floatingOpen: false }">
                                        <x-sidebar.menu-button
                                            @click.prevent.stop="$data.state === 'collapsed' ? null : submenuOpen = !submenuOpen"
                                            @mouseenter="if ($data.state === 'collapsed') floatingOpen = true"
                                            @mouseleave="if ($data.state === 'collapsed') floatingOpen = false">
                                            <x-slot:icon>
                                                <x-icon name="{{ $nav['icon'] ?? 'home' }}"/>
                                            </x-slot:icon>
                                            <span class="flex-1">{{ __($nav['label']) }}</span>
                                        </x-sidebar.menu-button>
                                        <x-sidebar.menu-sub label="{{ __($nav['label']) }}">
                                            @foreach($nav['items'] ?? [] as $sub)
                                                <x-sidebar.menu-sub-item>
                                                    <x-sidebar.menu-sub-button
                                                        :href="!empty($sub['route']) && Route::has($sub['route']) ? route($sub['route']) : null"
                                                        wire:navigate>
                                                        {{ __($sub['label']) }}
                                                    </x-sidebar.menu-sub-button>
                                                </x-sidebar.menu-sub-item>
                                            @endforeach
                                            <template x-teleport="body">
                                                <div x-show="floatingOpen && $data.state === 'collapsed'"
                                                     x-anchor.right.offset.10="$refs.dashBtn"
                                                     @mouseenter="floatingOpen = true"
                                                     @mouseleave="floatingOpen = false"
                                                     x-transition:enter="transition ease-out duration-200"
                                                     x-transition:enter-start="opacity-0 scale-95 -translate-x-2"
                                                     x-transition:enter-end="opacity-100 scale-100 translate-x-0"
                                                     x-transition:leave="transition ease-in duration-150"
                                                     x-transition:leave-start="opacity-100 scale-100 translate-x-0"
                                                     x-transition:leave-end="opacity-0 scale-95 -translate-x-2"
                                                     class="z-50 min-w-[12rem] overflow-hidden rounded-2xl bg-popover px-2 py-3 text-popover-foreground shadow-md">
                                                    <!-- Submenu Header -->
                                                    <div class="px-3 py-1.5 text-sm truncate text-muted-foreground">{{ __($nav['label']) }}</div>

                                                    @foreach($nav['items'] ?? [] as $sub)
                                                        <a role="menuitem" class="relative flex cursor-default select-none items-center rounded-xl px-3 py-1.5 text-sm truncate outline-none transition-colors hover:bg-input hover:text-accent-foreground cursor-pointer" href="{{!empty($sub['route']) && Route::has($sub['route']) ? route($sub['route']) : null}}" wire:navigate>
                                                            {{ __($sub['label']) }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </template>
                                        </x-sidebar.menu-sub>
                                    </x-sidebar.menu-sub-item>
                                @endif
                            @endforeach
                        </x-sidebar.menu>
                    </x-sidebar.group-content>
                </x-sidebar.group>
            @endforeach
        </x-sidebar.content>
        <x-sidebar.footer>
            <x-sidebar.menu>
                <x-sidebar.menu-item>
                    <x-sidebar.menu-button tooltip="{{ auth()->user()->name }}" class="h-auto! gap-4 py-2! hover:bg-transparent">
                        <x-slot:icon>
                            <div class="relative size-9 p-1.5">
                                <x-avatar class="size-full">
                                    <x-avatar.image src="{{ auth()->user()->imageurl }}"
                                                    alt="User Avatar"/>
                                    <x-avatar.fallback>W</x-avatar.fallback>
                                </x-avatar>
                                <svg class="absolute! inset-0! -rotate-90! size-auto! shrink!" viewBox="0 0 36 36"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-primary"
                                            stroke-width="2" stroke-dasharray="100"
                                            stroke-dashoffset="30"
                                            stroke-linecap="round"></circle>
                                </svg>
                            </div>
                        </x-slot:icon>
                        <div class="flex-1">
                            <div class="leading-1.3 text-secondary-foreground text-xs truncate whitespace-nowrap">
                                {{ auth()->user()->name }}
                            </div>
                            <div class="text-xs text-muted-foreground leading-1.3">{{ __('webmaster') }}</div>
                        </div>
                    </x-sidebar.menu-button>
                </x-sidebar.menu-item>
            </x-sidebar.menu>
        </x-sidebar.footer>
    </x-sidebar.sidebar>
    <x-sidebar.inset class="">
        <main class="w-full flex-1 [grid-area:main]" data-ui-main="">
            <div class="flex h-full flex-col lg:p-1 lg:pl-0">
                <div class="relative flex h-full flex-col grow lg:rounded-3xl lg:border lg:border-border/70 bg-background overflow-hidden">
                    @if(!($hideHeader ?? false))
                    <x-sidebar.header class="lg:px-6 shrink-0">
                        <div class="flex items-center gap-4">
                            <!-- Sidebar Trigger -->
                            <x-sidebar.trigger />
                        </div>
                        <div class="flex items-center ml-auto">
                            <x-button variant="outline" size="xs" class="rounded-full hidden pr-4">
                                <x-icon name="coins" class="size-4"/>
                                {{ __('Earning money') }}
                            </x-button>
                            <x-button variant="ghost" size="icon-sm" class="rounded-full" href="{{url('/')}}" target="_blank">
                                <x-icon name="store" class="size-5"/>
                            </x-button>


                            <x-dropdown>
                                <x-dropdown.trigger>
                                    <div class="relative ml-5">
                                        <x-avatar class="size-7">
                                            <x-avatar.image src="{{ auth()->user()->imageurl }}"
                                                            alt="User Avatar"/>
                                            <x-avatar.fallback>W</x-avatar.fallback>
                                        </x-avatar>
                                        <svg class="absolute -inset-2 -rotate-90" viewBox="0 0 36 36"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-primary"
                                                    stroke-width="2" stroke-dasharray="100"
                                                    stroke-dashoffset="30"
                                                    stroke-linecap="round"></circle>
                                        </svg>
                                    </div>
                                </x-dropdown.trigger>
                                <x-dropdown.content class="w-64 p-4 rounded-3xl">
                                    <div class="space-y-1">
                                        <x-dropdown.item href="{{ route('dashboard') }}" wire:navigate>
                                            <x-icon name="user-circle" class="size-4 mr-2" />
                                            {{ __('Profile') }}
                                        </x-dropdown.item>
                                        <x-dropdown.item href="{{ url('/') }}" target="_blank">
                                            <x-icon name="store" class="size-4 mr-2" />
                                            {{ __('View Site') }}
                                        </x-dropdown.item>
                                        <x-dropdown.separator />
                                        <x-dropdown.item href="{{ route('logout') }}" wire:navigate class="text-destructive hover:bg-destructive/10">
                                            <x-icon name="logout" class="size-4 mr-2" />
                                            {{ __('Logout') }}
                                        </x-dropdown.item>
                                    </div>
                                </x-dropdown.content>
                            </x-dropdown>
                        </div>
                    </x-sidebar.header>
                    @endif
                    <div class="flex-1 overflow-y-auto px-6 pb-6">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>
    </x-sidebar.inset>
</x-sidebar.provider>
@else
    <main class="min-h-screen w-full">
        {{ $slot }}
    </main>
@endif

@livewireScripts
</body>
</html>
