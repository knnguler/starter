@props([
    'key' => null,
])

<tr class="group" @if ($key) wire:key="table-{{ $key }}" @endif {{ $attributes }}>
    {{ $slot }}
</tr>
