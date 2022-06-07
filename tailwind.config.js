const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                /*'PVblue': '#D9E2E2',*/
                'PVblue': '#a3bbbf',
                'PVred': '#C63B3B',
            },
            maxWidth: {
                '1/4': '25%',
                '1/2': '300px',
                '3/4': '75%',
                'xxs': '10rem',
                'xxxs': '5rem',
              }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
