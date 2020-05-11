import VueRouter from 'vue-router';
import Posts from './posts/Posts';
import Post from './post/SinglePost';
import PostsFromCategory from'./posts/PostsFromCategory';
import Searched from'./posts/Searched';
import Review from './review/Review';
import Contact from './components/Contact.vue';
import Captcha from './components/Captcha.vue';


const routes = [
    {
        path: "/",
        component: Posts,
        name: "home"
    },
    {
        path: "/search/:phrase",
        component: Searched,
        name: "search"
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
    },
    {
        path: "/categories/:id",
        component: PostsFromCategory,
        name: "post-from-category"
    },
    {
        path: "/contact",
        component: Captcha,
        name: "contact"
    }
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

export default router;