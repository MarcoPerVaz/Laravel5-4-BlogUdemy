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

Vue.component('post-header', require('./components/PostHeader'));
Vue.component('nav-bar', require('./components/NavBar'));
Vue.component('posts-list', require('./components/PostsList'));
Vue.component('posts-list-item', require('./components/PostsListItem'));
Vue.component('category-link', require('./components/CategoryLink'));
Vue.component('post-link', require('./components/PostLink'));
Vue.component('disqus-comments', require('./components/DisqusComments'));
Vue.component('pagination-links', require('./components/PaginationLinks'));
Vue.component('paginator', require('./components/Paginator'));

// require('vue2-animate/dist/vue2-animate.min.css')

const app = new Vue({
    el: '#app',
    router: router
});


