require('./bootstrap');
// require('./bootstrap-additions/bootstrap.bundle');
// require('./bootstrap-additions/jquery');


import VueRouter from 'vue-router';
import router from './routes';
import moment from "moment";
import Index from './components/index';
import myNav from './components/nav.vue';
import myFooter from './components/my-footer';
import StarRating from "./sheard/components/StarRating";
import Success from "./sheard/components/Success";

import { store } from './store';

window.Vue = require('vue');
Vue.use(VueRouter);

Vue.filter("fromNow", value => moment(value).fromNow());
Vue.component("StarRating", StarRating);
Vue.component("success", Success);

const app = new Vue({
    el: '#app',
    router: router,
    store,
    components: {
        "index": Index,
        "my-footer": myFooter,
        "my-nav": myNav
    }
});

// if (jQuery) {
//     alert("jquery is loaded");
// } else {
//     alert("Not loaded");
// }