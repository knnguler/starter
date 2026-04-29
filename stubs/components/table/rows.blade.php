@php
    $divideClasses = '';

    // Removes the top border when there are no rows (prevents errant scrollbar)
    $emptyStateFixClasses = '[&:not(:has(*))]:border-t-0!';

    $classes = trim(
        $divideClasses . ' ' .
        $emptyStateFixClasses
    );
@endphp


<tbody {{ $attributes->class($classes) }} data-flux-rows>
    {{ $slot }}
</tbody>
