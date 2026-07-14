const mix = require('laravel-mix');

// 1. Kompilasi file JavaScript utama dan file CSS
mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       // Tambahkan plugin PostCSS seperti Tailwind jika digunakan
   ]);
