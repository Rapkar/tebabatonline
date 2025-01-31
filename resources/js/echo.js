import Echo from 'laravel-echo';
import Pusher from 'pusher-js'; // Import Pusher library
 
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,// Adjust as necessary; may not be needed for Reverb
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort:import.meta.env.VITE_REVERB_PORT, // Default port for Reverb; adjust if necessary
    forceTLS: false,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],
    authEndpoint: '/broadcasting/auth',
    auth: {
        headers: {
            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
});

// console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'))