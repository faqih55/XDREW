const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .react('resources/js/ai-chat/index.jsx', 'public/js/ai-chat.js');
