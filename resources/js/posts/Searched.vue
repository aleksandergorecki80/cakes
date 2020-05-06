<template>
    <div>
        <div v-if="loading">
            Data is loading...
        </div>
        <div v-else>
            <div class="row mb-4" v-for="row in rows" :key="'row' + row"> 
                <div class="col d-flex align-items-stretch" v-for="(post, column) in getPosts" :key="'row' + row + column">
                    <PostListItem 
                        v-bind="post"
                    ></PostListItem> 
                </div>
                <div class="col" v-for="p in placeholderInRow(row)" :key="'placeholder' + row + p"></div>
            </div>
            </div>
    </div>
</template>

<script>
import PostListItem from "./PostListItem"; 
// import { mapState } from 'vuex';

export default {
    components: {
        PostListItem
    },
    data(){
        return {
            // posts: null,
            loading: false,
            columns: 3,
        }
    },
    computed: {
        getPosts(){
            return this.$store.state.posts;
        },
        rows(){
            return this.getPosts === null ? 0 : Math.ceil(this.getPosts.length / this.columns);
        },
    },
    methods: {
        postsInRow(row){
            return this.getPosts.slice((row - 1)* this.columns, row * this.columns);
        },
        placeholderInRow(row){
            return this.columns - this.postsInRow(row).length;
        },
    },
     


    // beforeMount(){
    //     console.log('before mount');
    // },
    mounted(){
        // console.log('mounted');
    },
    // beforeDestroy(){
    //     console.log('before destroy');
    // },
    // destroyed(){
    //     console.log('destroyed');
    // }
}
</script>