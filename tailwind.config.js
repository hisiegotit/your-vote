import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                xxs: ['0.625rem', { lineHeight: '1rem' }],
            },
            maxWidth: {
                'custom' : '68.5rem',
            },
            boxShadow: {
                card: '4px 4px 15px 0 rgba(36, 37, 38, 0.08)',
                dialog: '3px 4px 15px 0 rgba(36, 37, 38, 0.22)',
            },
            spacing: {
                38: '9.5rem',
                44: '11rem',
                70: '17.5rem',
                175: '43.75rem',
            },
            colors: {
                black : '#000000',
                white : '#ffffff',
                transparent: 'transparent',
                current: 'currentColor',
                'gray-background': '#f3f4f6',
                'blue': '#328af1',
                'blue-hover': '#2879bd',
                'yellow' : '#ffc73c',
                'red' : '#ec454f',
                'green' : '#1aab8b',
                'purple' : '#8b60ed',
                'light-pink': '#ffc8dd',
                'pink' : '#ffafcc',
                'strong-pink' : '#ff8bbd',
            },
            margin: {
                '6': '1.5rem',
                '22': '5.5rem',
            },
        },
    },

    plugins: [forms],
};
