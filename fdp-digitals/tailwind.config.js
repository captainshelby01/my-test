/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#E11D48', // Your brand red
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
};