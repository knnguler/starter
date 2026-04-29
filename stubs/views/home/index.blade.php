<div class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden bg-radial from-slate-900 via-slate-950 to-black text-slate-100">
    
    <!-- Ambient Glow effects -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl -translate-y-1/2 animate-pulse duration-5000"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-emerald-600/20 rounded-full blur-3xl translate-y-1/2 animate-pulse duration-3000"></div>

    <!-- Hero Section -->
    <div class="relative z-10 max-w-4xl mx-auto text-center px-6 py-12">
        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/5 border border-white/10 text-sm font-medium text-indigo-300 backdrop-blur-md shadow-lg mb-8 animate-fade-in">
            <x-icon name="sparkles" class="w-4 h-4 text-indigo-400" />
            {{ __('Yeni Nesil Laravel Başlangıç Kiti') }}
        </span>

        <h1 class="text-5xl md:text-7xl font-black tracking-tight bg-clip-text text-transparent bg-linear-to-r from-white via-slate-200 to-slate-400 mb-6">
            {{ __('Göz Alıcı Arayüzler,') }} <br/>
            <span class="bg-clip-text text-transparent bg-linear-to-r from-indigo-400 to-emerald-400">{{ __('Üstün Performans.') }}</span>
        </h1>

        <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto mb-10 leading-relaxed">
            {{ __('Tüm sayfalarda wire:navigate deneyimi ile anında yüklenen, güvenli ve modern web uygulamaları tasarlayın.') }}
        </p>

        <!-- Dynamic Controls (Approach 2 Demo) -->
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-6 mb-12 shadow-2xl max-w-xl mx-auto">
            <h3 class="text-base font-semibold text-slate-200 mb-4 flex items-center justify-center gap-2">
                <x-icon name="adjustments-horizontal" class="w-5 h-5 text-emerald-400" />
                {{ __('2. Yaklaşım Test Alanı') }}
            </h3>
            <p class="text-xs text-slate-400 mb-4">
                {{ __('Aşağıdaki butonlara tıklayarak wire:navigate akıcılığını bozmadan layout öğelerini gizleyip gösterebilirsiniz.') }}
            </p>
            
            <div class="flex flex-wrap justify-center gap-4">
                <x-button 
                    wire:click="toggleNavbar" 
                    variant="outline" 
                    class="rounded-2xl border-white/10 bg-slate-900/50 text-slate-300 hover:bg-indigo-600/20 hover:border-indigo-500/50 hover:text-indigo-200 transition-all duration-300"
                >
                    <x-slot:icon>
                        <x-icon name="{{ $hideNavbar ? 'eye' : 'eye-off' }}" class="w-4 h-4" />
                    </x-slot:icon>
                    {{ $hideNavbar ? __('Navbar\'ı Göster') : __('Navbar\'ı Gizle') }}
                </x-button>

                <x-button 
                    wire:click="$toggle('hideFooter')" 
                    variant="outline" 
                    class="rounded-2xl border-white/10 bg-slate-900/50 text-slate-300 hover:bg-emerald-600/20 hover:border-emerald-500/50 hover:text-emerald-200 transition-all duration-300"
                >
                    <x-slot:icon>
                        <x-icon name="{{ $hideFooter ? 'eye' : 'eye-off' }}" class="w-4 h-4" />
                    </x-slot:icon>
                    {{ $hideFooter ? __('Footer\'ı Göster') : __('Footer\'ı Gizle') }}
                </x-button>
            </div>
        </div>

        <!-- Call to Actions -->
        <div class="flex justify-center gap-6">
            <x-button 
                href="{{ route('admin.home') }}" 
                wire:navigate
                class="rounded-full bg-linear-to-r from-indigo-600 to-indigo-500 hover:from-indigo-500 hover:to-indigo-400 text-white font-semibold px-8 py-6 shadow-[0_0_30px_rgba(79,70,229,0.3)] transition-all duration-300 hover:scale-105"
            >
                {{ __('Yönetim Paneli') }}
            </x-button>
            
            <x-button 
                href="{{ route('login') }}" 
                wire:navigate
                variant="ghost"
                class="rounded-full text-slate-300 hover:text-white hover:bg-white/5 px-8 py-6"
            >
                {{ __('Giriş Yap') }}
            </x-button>
        </div>
    </div>

    <!-- Decorative footer note -->
    <div class="absolute bottom-6 text-center z-10">
        <p class="text-xs text-slate-600 font-medium flex items-center justify-center gap-1">
            {{ __('Powered by') }} <span class="text-indigo-500 font-semibold">Livewire 3</span> & <span class="text-emerald-500 font-semibold">Tailwind CSS 4</span>
        </p>
    </div>

</div>
