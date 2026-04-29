<div class="max-w-7xl w-full mx-auto pb-10">
    <x-table :paginate="$users">
        <x-slot:header>
            <header class="flex items-center gap-0.5 py-6">
                <h1 class="text-lg lg:text-xl font-semibold flex-1">{{__('Users')}}</h1>
                <div>
                    <div class="flex items-center gap-2 pb-3">
                        <div class="flex-1 relative hidden lg:block">
                            <x-input type="text" placeholder="{{__('Search')}} .."
                                     class="border-transparent bg-transparent dark:bg-transparent rounded-full max-w-xxs"
                                     iconLeading="search" size="sm"
                                     wire:model.live.debounce.500ms="search">
                            </x-input>
                        </div>
                    </div>
                </div>
            </header>
        </x-slot:header>
        <x-table.columns>
            <x-table.column sortable :sorted="$sortBy === 'name'" :direction="$sortDir"
                            wire:click="sort('name')">{{__('User')}}</x-table.column>
            <x-table.column sortable :sorted="$sortBy === 'email'" :direction="$sortDir"
                            wire:click="sort('email')">{{__('Email')}}</x-table.column>
            <x-table.column sortable :sorted="$sortBy === 'created_at'" :direction="$sortDir"
                            wire:click="sort('created_at')">{{__('Joined')}}</x-table.column>
        </x-table.columns>

        <x-table.rows>
            @foreach ($users as $user)
                <x-table.row :key="$user->id">
                    <x-table.cell>
                        <div class="flex items-center gap-4 hover:text-foreground group cursor-pointer">
                            <x-avatar class="size-9">
                                <x-avatar.image :src="$user->imageurl" :alt="$user->name"/>
                                <x-avatar.fallback>
                                    {{ strtoupper(mb_substr($user->name,0,1)) }}
                                </x-avatar.fallback>
                            </x-avatar>
                            <div class="flex-1">
                                <div class="font-medium group-hover:underline">{{$user->name ?? __('Untitled')}}</div>
                            </div>
                        </div>
                    </x-table.cell>
                    <x-table.cell>
                        <div class="text-accent-foreground text-xs">{{$user->email}}</div>
                    </x-table.cell>
                    <x-table.cell>
                        {{$user->created_at->format('d M Y')}}
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-table.rows>
    </x-table>
</div>
