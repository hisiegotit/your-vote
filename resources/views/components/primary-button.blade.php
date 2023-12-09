<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-overlay0 dark:bg-overlay0 border border-transparent rounded-md font-semibold text-xs text-white dark:text-maroon uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-overlay0 focus:bg- dark:focus:bg-overlay0 active:bg-overlay1 dark:active:bg-overlay1 focus:outline-none focus:ring-2 focus:ring-maroon focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
