import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
<<<<<<< HEAD
            input: ['resources/css/app.css', 'resources/js/app.js'],
=======
=======
>>>>>>> a69b2818b4705e752469399df88b92fd0f234bb5
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
<<<<<<< HEAD
>>>>>>> d770067ed94c9c727b2772442ef1c08376d3abed
=======
>>>>>>> a69b2818b4705e752469399df88b92fd0f234bb5
            refresh: true,
        }),
    ],
});
