<div class="max-w-7xl w-full mx-auto pb-10 pt-6">
    {{-- Stats Cards --}}
    <div class="grid gap-6 md:grid-cols-12">
        <div class="col-span-4">
            <div class="border bg-card text-card-foreground rounded-3xl shadow-sm px-5 py-5 flex items-center gap-4">
                <div class="flex size-12 shrink-0 items-center justify-center rounded-2xl bg-orange-500/20">
                    <x-icon name="user-circle" class="h-5 w-5 text-orange-400" />
                </div>
                <div class="flex flex-1 flex-col gap-0.5">
                    <div class="text-2xl font-medium">
                        {{ number_format($totalUsers, 0, ',', '.') }}
                    </div>
                    <div class="text-xs text-muted-foreground">
                        {{ __('Users') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Users --}}
    <div class="mt-8 border bg-card text-card-foreground rounded-3xl shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-border/50 flex items-center justify-between">
            <h2 class="text-sm font-semibold text-foreground">{{ __('Recent Users') }}</h2>
            <a href="{{ route('admin.users') }}" wire:navigate class="text-xs text-primary hover:underline">{{ __('View all') }}</a>
        </div>
        <div class="divide-y divide-border/50">
            @forelse($recentUsers as $user)
                <div class="px-5 py-3 flex items-center gap-3">
                    <x-avatar class="size-8">
                        <x-avatar.image src="{{ $user->imageurl }}" alt="{{ $user->name }}" />
                        <x-avatar.fallback>{{ strtoupper(substr($user->name, 0, 1)) }}</x-avatar.fallback>
                    </x-avatar>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-medium text-foreground truncate">{{ $user->name }}</div>
                        <div class="text-xs text-muted-foreground truncate">{{ $user->email }}</div>
                    </div>
                    <div class="text-xs text-muted-foreground shrink-0">{{ $user->created_at->diffForHumans() }}</div>
                </div>
            @empty
                <div class="px-5 py-8 text-center text-sm text-muted-foreground">{{ __('No users yet.') }}</div>
            @endforelse
        </div>
    </div>
</div>
