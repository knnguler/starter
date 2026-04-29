@props(['name'])

@error($name)
    <div {{ $attributes->merge(['class' => 'text-sm text-red-400 dark:text-red-400 space-y-1']) }}>
        {{ $message }}
    </div>
@enderror
