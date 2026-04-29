@props([
    'paginate' => null,
    'header' => null,
])

@php
    $baseClasses = '[:where(&)]:min-w-full w-full table';
    $textClasses = '';
    $divideClasses = '';
    // We want whitespace-nowrap for the table, but not for modals and dropdowns...
    $whitespaceClasses = 'whitespace-nowrap [&_dialog]:whitespace-normal [&_[popover]]:whitespace-normal';

    $classes = trim(
        $baseClasses . '' .
        $textClasses . ' ' .
        $divideClasses . ' ' .
        $whitespaceClasses
    );
@endphp


<div class="">
    {{ $header ?? '' }}
    <div class="relative w-full overflow-x-auto lg:overflow-x-visible">
        <table {{ $attributes->class($classes) }}>
            {{ $slot }}
        </table>
    </div>
    {{ $footer ?? '' }}
    <?php if ($paginate): ?>
    {{ $paginate->onEachSide(1)->links('components.pagination.index') }}
    <?php endif; ?>
</div>
