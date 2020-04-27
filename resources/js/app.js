require('./bootstrap');

import VueRouter from 'vue-router';
import router from './routes';
import Index from './components/index';
import myFooter from './components/my-footer';

// import Kki from './components/kki';
// import Bar from './components/bar.vue';
// import Baz from './components/baz.vue';

window.Vue = require('vue');

// Vue.component('aa', require('./components/bar.vue').default);
// Vue.component('my-footer', require('./components/baz.vue').default);


Vue.use(VueRouter);
const app = new Vue({
    el: '#app',
    router: router,
    components: {
        "index": Index,
        "my-footer": myFooter
    }
});
