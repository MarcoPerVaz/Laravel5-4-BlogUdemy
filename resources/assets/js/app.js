

window.Vue = require('vue');

import Router from 'vue-router';

Vue.use(Router);

// Rutas
    let router = new Router({
        routes: [
            {
                path: '/',
                component: require('./views/Home')
            },
            {
                path: '/nosotros',
                component: require('./views/About')
            },
            {
                path: '/archivo',
                component: require('./views/Archive')
            },
            {
                path: '/contacto',
                component: require('./views/Contact')
            },    
        ],

        linkExactActiveClass: 'active',
    });
// 

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    router: router
});


