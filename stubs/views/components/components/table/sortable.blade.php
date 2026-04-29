@props([
    'direction' => null,
    'sorted' => false,
])

@php
    $baseClasses = 'group/sortable inline-flex items-center gap-2 -my-1 -ms-2 -me-2 px-2 py-1 cursor-pointer text-muted-foreground hover:text-accent-foreground';
    $endAlignClasses = 'in-[.group\/end-align]:flex-row-reverse in-[.group\/end-align]:-me-2 in-[.group\/end-align]:-ms-8';

    $classes = trim(
        $baseClasses . ' ' .
        $endAlignClasses
    );
@endphp


<button type="button" {{ $attributes->class($classes) }} data-flux-table-sortable>
    {{ $slot }}
    <div class="[&>svg]:size-4">
        @if ($sorted)
            @if ($direction === 'asc')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 10.8284L7.0502 15.7782L5.63599 14.364L11.9999 8L18.3639 14.364L16.9497 15.7782L11.9999 10.8284Z"></path></svg>
            @elseif ($direction === 'desc')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>
            @endif
        @else
            <x-icon name="expand" class="size-4"/>
        @endif
    </div>
</button>
