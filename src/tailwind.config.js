/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: ["class", '[data-mode="light"]'],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {},
        screens: {
            // --------------------------------------------------
            // custom settings
            // --------------------------------------------------

            maxlg: { max: "1023px" },
            
            // --------------------------------------------------
            // tailwind default
            // --------------------------------------------------
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
        },
    },
    plugins: [],
};
