const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './src/**/*{.html,js}',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/**/*.blade.php', 
        './resources/views/**/*.blade.php'
        
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            lineHeight: {
                '75': '75px',
            },
            boxShadow: {

                'outline' : '5px 5px 10px rgba(0, 0, 0, 0.25), -5px -5px 10px rgba(255, 255, 255, 0.8)',
                'outlineHover' : '1px 1px 5px rgba(0, 0, 0, 0.2), -1px -1px 5px rgba(255, 255, 255, 0.6), inset -2px -2px 5px rgba(255, 255, 255, 0.6), inset 2px 2px 5px rgba(0, 0, 0, 0.2)',
            }
                
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
