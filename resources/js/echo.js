import Echo from 'laravel-echo';
import $ from 'jquery';
// import Pusher from 'pusher-js';
// window.Pusher = Pusher;
var receiverId=$('select[name="users"]').val();
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: '723614bfcaeb1ebf3619',
//     cluster: 'ap2',
//     forceTLS: true
// });
 

// window.Echo = new Echo({ broadcaster: 'pusher', key: '723614bfcaeb1ebf3619', cluster: 'ap2', forceTLS: true });
// window.Echo.channel(`chat.${receiverId}`)
//     .listen('message.sent', (e) => {
//         console.log(e);
//     });