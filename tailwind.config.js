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
                sans: ['Poppins','Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'biru': '#131049',
            'birumuda': '#d9f4ff',
            'ping' : '#fdced0',
            'putih' : '#ffffff',
            'merah' : '#cd224c',
        }
    },

    plugins: [
        forms,
        require('flowbite/plugin')({
            charts: true,
        }),
    ],
};
