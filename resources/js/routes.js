import VueRouter from 'vue-router';
import ExampleComponent from './components/ExampleComponent';
import Kki from './components/kki';


const routes = [
    {
        path: "/",
        ExampleComponent,
        name: "home"
    },
        {
        path: "/kki",
        component: Kki,
        name: "kki"
    }
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

export default router;