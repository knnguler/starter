@props([
    'direction' => null,
    'sortable' => false,
    'sorted' => false,
    'align' => 'start',
])

@php
    $baseClasses = '';
    $textClasses = '';

    $alignClasses = match ($align) {
        'center' => 'group/center-align',
        'end' => 'group/end-align',
        'right' => 'group/end-align',
        default => '',
    };

    $sortableFixClasses = '**:data-flux-table-sortable:last:me-0';

    $classes = trim(
        $baseClasses . ' ' .
        $textClasses . ' ' .
        $alignClasses . ' ' .
        $sortableFixClasses
    );
@endphp


<th {{ $attributes->twMerge($classes) }}>
    <?php if ($sortable): ?>
        <div class="inline-flex in-[.group\/center-align]:justify-center in-[.group\/end-align]:justify-end">
            <x-table.sortable :$sorted :direction="$direction">
                <div>{{ $slot }}</div>
            </x-table.sortable>
        </div>
    <?php else: ?>
        <div class="flex in-[.group\/center-align]:justify-center in-[.group\/end-align]:justify-end">{{ $slot }}</div>
    <?php endif; ?>
</th>
