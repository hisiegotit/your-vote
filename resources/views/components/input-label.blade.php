@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-maroon dark:text-maroon']) }}>
    {{ $value ?? $slot }}
</label>
