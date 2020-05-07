<template>
    <div>
        <div v-if="loading">
            Data is loading...
        </div>
        <div v-else>
            <div class="row mb-4" v-for="row in rows" :key="'row' + row"> 
                <div class="col d-flex align-items-stretch" v-for="(post, column) in postsInRow(row)" :key="'row' + row + column">
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
export default {
    components: {
        PostListItem
    },
    data(){
        return {
            posts: null,
            loading: false,
            columns: 3,
            id: null
        }
    },
    computed: {
        rows(){
            return this.posts === null ? 0 : Math.ceil(this.posts.length / this.columns);
        }
    },
    methods: {
        postsInRow(row){
            return this.posts.slice((row - 1)* this.columns, row * this.columns);
        },
        placeholderInRow(row){
            return this.columns - this.postsInRow(row).length;
        }
    },
    beforeCreate(){
        // console.log('beforeCreate');
        this.id= this.$route.params.id
    },
    created(){
        this.loading = true;
     
//      ------  PROMISE EXAMPLE
        // const promise = new Promise((resolve, reject)=>{
        //     // console.log(resolve);
        //     // console.log(reject);
        //     setTimeout(() => resolve('hello'), 3000);
        // })
        // .then((result) => `Hello again ${result} `)
        // .then((result) => {console.log(`Success ${result}`)})
        // .catch((result) =>{console.log(`Error ${result}`)});
        // console.log(promise);

        const request = axios
        .get(`/api/categories/${this.$route.params.id}`)
        .then(response => {
            this.posts = response.data.data;
            this.loading = false;
            });
        },

    // beforeMount(){
    //     console.log('before mount');
    // },
    mounted(){
        this.id = null;
    },
    // beforeDestroy(){
    //     console.log('before destroy');
    // },
    // destroyed(){
    //     console.log('destroyed');
    // }
}
</script>