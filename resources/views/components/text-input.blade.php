@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-maroon dark:focus:border-maroon focus:ring-maroon dark:focus:ring-maroon rounded-md shadow-sm']) !!}>
