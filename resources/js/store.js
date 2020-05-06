import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({    
    state: {
        posts: null
    },
    mutations: {
        setPosts(state, payload){
            state.posts = payload;
        }
    },
    // getters: {
    //     // funkcja która za parametr bierze state i coś robi np:
    //     mapedPost(state){
    //         return state.posts;
    //     }
    // }
});




