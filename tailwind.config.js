import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    /* This is needed to allow the use of the `from-${color}-500` classes,
     * and we should keep it to a minimum to avoid bloating the CSS file.
     */
    safelist: [
        {pattern: /(from|via|to)-(red|green|amber|purple|blue|teal)-(500|600|700)/},
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Lato', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                '2xl': '2.5rem',
            },
            fontOpticalSizing: ['auto'],

        },
    },

    plugins: [forms],
};
