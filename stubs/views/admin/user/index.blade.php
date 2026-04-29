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


                        <div class="relative">
                            <x-dropdown>
                                <x-dropdown.trigger>
                                    <x-button variant="ghost" size="icon-sm" class="rounded-full">
                                        <x-icon name="filter" class="size-4" />
                                    </x-button>
                                </x-dropdown.trigger>
                                <x-dropdown.content class="w-80 p-6 rounded-3xl">
                                    <x-field>
                                        <x-label>{{ __('Account type') }}</x-label>
                                        <x-select wire:model.live="type" size="sm">
                                            <option value="">{{ __('All') }}</option>
                                            <option value="admin">{{ __('Admin') }}</option>
                                            <option value="user">{{ __('User') }}</option>
                                        </x-select>
                                    </x-field>
                                </x-dropdown.content>
                            </x-dropdown>
                        </div>
                        <x-button variant="outline" size="sm" href="{{route('admin.user.create')}}" wire:navigate class="rounded-full pr-4">
                            <x-icon name="plus" class="size-4" />
                            <span>{{__('Add new')}}</span>
                        </x-button>
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
            <x-table.column></x-table.column>
        </x-table.columns>

        <x-table.rows>
            @foreach ($users as $user)
                <x-table.row :key="$user->id">
                    <x-table.cell>
                        <a href="{{route('admin.user.edit', $user->id)}}" wire:navigate class="flex items-center gap-4 hover:text-foreground group cursor-pointer">
                            <x-avatar class="size-9">
                                <x-avatar.image :src="$user->imageurl" :alt="$user->name"/>
                                <x-avatar.fallback>
                                    {{ strtoupper(mb_substr($user->name,0,1)) }}
                                </x-avatar.fallback>
                            </x-avatar>
                            <div class="flex-1">
                                <div class="font-medium group-hover:underline">{{$user->name ?? __('Untitled')}}</div>
                            </div>
                        </a>
                    </x-table.cell>
                    <x-table.cell>
                        <div class="text-accent-foreground text-xs">{{$user->email}}</div>
                    </x-table.cell>
                    <x-table.cell>
                        {{$user->created_at->format('d M Y')}}
                    </x-table.cell>
                    <x-table.cell align="end" class="-space-x-1">
                        <x-button href="{{route('admin.user.edit', $user->id)}}" wire:navigate variant="ghost" size="icon-sm">
                            <x-icon name="edit" class="size-4" />
                        </x-button>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-table.rows>
    </x-table>
</div>
