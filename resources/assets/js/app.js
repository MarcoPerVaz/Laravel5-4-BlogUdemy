

window.Vue = require('vue');

import Router from 'vue-router';

Vue.use(Router);

// Rutas
    let router = new Router({
        routes: [
            {
                path: '/',
                component: {
                    template: '<div>Este es el home</div>'
                }
            },
            {
                path: '/nosotros',
                component: {
                    template: '<div>Este es el nosotros</div>'
                }
            },
            {
                path: '/archivo',
                component: {
                    template: '<div>Este es el archivo</div>'
                }
            },
            {
                path: '/contacto',
                component: {
                    template: '<div>Este es el contacto</div>'
                }
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


