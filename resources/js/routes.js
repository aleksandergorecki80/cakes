import VueRouter from 'vue-router';
import Posts from './posts/Posts';
import Post from './post/SinglePost';
import Review from './review/Review';


const routes = [
    {
        path: "/",
        component: Posts,
        name: "home"
    },
    {
        path: "/post/:id",
        component: Post,
        name: "post"
    },
    {
        path: "/review/:id",
        component: Review,
        name: "review"
    }
    
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

export default router;