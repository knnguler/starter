<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __($config['title'] ?? config('app.name', 'Laravel')) }}</title>
    <meta name="description" content="{{ __($config['description'] ?? '') }}">
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

    @livewireStyles
</head>
<body
    class="dark antialiased min-h-screen bg-background text-foreground relative flex flex-col [--header-height:calc(--spacing(16))] lg:[--header-height:calc(--spacing(18))] [--sidebar-width:220px] lg:[--sidebar-width:calc(--spacing(56))] [--sidebar-collapsed-width:calc(--spacing(16))]"
    x-data x-cloak>
@if(!($hideNavbar ?? false) && !request()->routeIs('login', 'register', 'password.*'))
    @includeIf('livewire.pages.partials.navbar')
@endif
{{ $slot }}
@if(!($hideFooter ?? false) && !request()->routeIs('login', 'register', 'password.*'))
    @includeIf('livewire.pages.partials.footer')
@endif

@if(!request()->routeIs('login', 'register', 'password.*'))
{{-- ============================================================ --}}
{{-- FLOATING CONTACT WIDGET (Alpine.js) --}}
{{-- ============================================================ --}}
<div
    x-data="{
        open: false,
        tooltip: false,
        dismissed: false,

        init() {
            // Show tooltip after 2 seconds
            setTimeout(() => { if (!this.dismissed) this.tooltip = true }, 1000);
            // Auto-hide tooltip after 7 seconds
            setTimeout(() => { this.tooltip = false }, 10000);
        },

        dismiss() {
            this.tooltip = false;
            this.dismissed = true;
        },

        toggle() {
            this.open = !this.open;
            this.tooltip = false;
        }
    }"
    class="fixed bottom-6 right-6 lg:right-10 lg:bottom-10 z-50 flex flex-col items-end gap-1"
>
    {{-- Tooltip Bubble --}}
    <div
        x-show="tooltip && !open && !dismissed"
        class="flex items-center gap-3 bg-linear-to-bl from-white/10 to-white/5 text-foreground text-base font-medium px-4 py-2.5 rounded-3xl shadow-xl max-w-[240px] cursor-default"
        @click="dismiss()"
    >
        <span>{{ __('Hello') }} 👋</span>
        <button @click.stop="dismiss()" class="ml-auto text-muted-foreground hover:text-foreground transition-colors shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
    </div>

    {{-- Sub-buttons (Telegram + Email) --}}
    <div class="flex flex-col items-end gap-2.5 mb-2">

        {{-- Telegram Button --}}
        <div
            x-show="open"
        >
            <a
                href="https://t.me/codelugv2"
                target="_blank"
                rel="noopener"
                class="group flex items-center gap-3 px-4 py-2.5 rounded-full bg-linear-to-bl from-sky-500 to-blue-600 hover:bg-linear-to-tr text-white text-sm transition-all duration-200"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 size-5" viewBox="0 0 24 24" fill="currentColor"><path d="M2.14753 11.8099C7.3949 9.52374 10.894 8.01654 12.6447 7.28833C17.6435 5.20916 18.6822 4.84799 19.3592 4.83606C19.5081 4.83344 19.8411 4.87034 20.0567 5.04534C20.2388 5.1931 20.2889 5.39271 20.3129 5.5328C20.3369 5.6729 20.3667 5.99204 20.343 6.2414C20.0721 9.08763 18.9 15.9947 18.3037 19.1825C18.0514 20.5314 17.5546 20.9836 17.0736 21.0279C16.0283 21.1241 15.2345 20.3371 14.2221 19.6735C12.6379 18.635 11.7429 17.9885 10.2051 16.9751C8.42795 15.804 9.58001 15.1603 10.5928 14.1084C10.8579 13.8331 15.4635 9.64397 15.5526 9.26395C15.5637 9.21642 15.5741 9.03926 15.4688 8.94571C15.3636 8.85216 15.2083 8.88415 15.0962 8.9096C14.9373 8.94566 12.4064 10.6184 7.50365 13.928C6.78528 14.4212 6.13461 14.6616 5.55163 14.649C4.90893 14.6351 3.67265 14.2856 2.7536 13.9869C1.62635 13.6204 0.730432 13.4267 0.808447 12.8044C0.849081 12.4803 1.29544 12.1488 2.14753 11.8099Z"></path></svg>
                {{ __('Contact me on Telegram') }}
            </a>
        </div>

        {{-- Email Button --}}
        <div
            x-show="open"
        >
            <a
                href="https://t.me/codelugv2"
                target="_blank"
                rel="noopener"
                class="group flex items-center gap-3 px-4 py-2.5 rounded-full bg-linear-to-bl from-accent to-muted hover:bg-linear-to-tr text-white text-sm transition-all duration-200"
            ><svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 size-4" viewBox="0 0 24 24" fill="currentColor"><path d="M21 3C21.5523 3 22 3.44772 22 4V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V19H20V7.3L12 14.5L2 5.5V4C2 3.44772 2.44772 3 3 3H21ZM8 15V17H0V15H8ZM5 10V12H0V10H5ZM19.5659 5H4.43414L12 11.8093L19.5659 5Z"></path></svg>
                {{ __('Contact me on Email') }}
            </a>
        </div>

    </div>
    <button
        @click="toggle()"
        class="relative w-14 h-14 rounded-b-4xl rounded-r-4xl rounded-l-3xl bg-linear-to-bl from-primary to-primary/50 text-primary-foreground cursor-pointer shadow-[0_4px_24px_rgba(0,0,0,0.25)] hover:scale-105 transition-all duration-300 flex items-center justify-center"
        aria-label="{{ __('Contact Us') }}"
    ><svg class="size-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21 8C22.1046 8 23 8.89543 23 10V14C23 15.1046 22.1046 16 21 16H19.9381C19.446 19.9463 16.0796 23 12 23V21C15.3137 21 18 18.3137 18 15V9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9V16H3C1.89543 16 1 15.1046 1 14V10C1 8.89543 1.89543 8 3 8H4.06189C4.55399 4.05369 7.92038 1 12 1C16.0796 1 19.446 4.05369 19.9381 8H21ZM7.75944 15.7849L8.81958 14.0887C9.74161 14.6662 10.8318 15 12 15C13.1682 15 14.2584 14.6662 15.1804 14.0887L16.2406 15.7849C15.0112 16.5549 13.5576 17 12 17C10.4424 17 8.98882 16.5549 7.75944 15.7849Z"></path></svg>

    </button>

</div>
@endif

@livewireScripts
</body>
</html>
