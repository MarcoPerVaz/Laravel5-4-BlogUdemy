window.Vue = require('vue');

import Router from 'vue-router';

Vue.use(Router);

// Rutas
export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: require('./views/Home')
    },
    {
      path: '/nosotros',
      name: 'about',
      component: require('./views/About')
    },
    {
      path: '/archivo',
      name: 'archive',
      component: require('./views/Archive')
    },
    {
      path: '/contacto',
      name: 'contact',
      component: require('./views/Contact')
    },
    {
      path: '/blog/:url',
      name: 'posts_show',
      component: require('./views/PostsShow')
    },
    {
      path: '*',
      component: require('./views/404')
    },
  ],

  linkExactActiveClass: 'active',
});
//