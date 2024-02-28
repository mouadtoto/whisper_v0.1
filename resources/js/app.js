import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const userId = window.userId;
window.Echo.private(`chat.${userId}`)
    .listen('.new-message', (event) => {
        console.log('New message received:', event);

    });
