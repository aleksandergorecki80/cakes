require('./bootstrap');

import VueRouter from 'vue-router';
import router from './routes';
import Index from './components/index';
import myNav from './components/nav.vue';
import myFooter from './components/my-footer';

window.Vue = require('vue');

Vue.use(VueRouter);
const app = new Vue({
    el: '#app',
    router: router,
    components: {
        "index": Index,
        "my-footer": myFooter,
        "my-nav": myNav
    }
});
