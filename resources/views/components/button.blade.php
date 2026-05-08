<button 
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => '
            inline-flex items-center px-4 py-2 border border-transparent rounded-md 
            font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150
            bg-gray-800 text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900
            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
            dark:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-300 dark:focus:bg-gray-300 dark:active:bg-gray-400
        '
    ]) }}
>
    {{ $slot }}
</button>

