require('./bootstrap');

window.Vue = require('vue');

// Rutas
import router from './routes';
// 

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('post-header', require('./components/PostHeader.vue'));
Vue.component('nav-bar', require('./components/NavBar.vue'));

const app = new Vue({
    el: '#app',
    router: router
});


