import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js', 'resources/js/table.search.js',
                'resources/css/app.css', 'resources/css/header.css', 'resources/css/quiz.css', 
                'resources/css/quizGame.css','resources/css/result.css', 'resources/css/dict.index.css',
            ],
            refresh: true,
        }),
    ],
});
