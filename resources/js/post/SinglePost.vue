<template>
    <div class="row">
        <div class="col-md-8 pb-4">
            <div class="card">
                <div class="card-body">
                    <div v-if="loading">
                        Data is loading...
                    </div>
                    <div v-else>
                        <h3>{{ post.title }}</h3>
                        <hr />
                        <span v-html=post.body></span>
                    </div>
                </div>
            </div>
                    <ReviewList v-bind:post-id="this.$route.params.id | turnIntoString"></ReviewList>
                    <Review></Review>
        </div>
        <div class="col-md-4 pb-4">
            prawa strona
        </div>
    </div>
</template>

<script>
    import ReviewList from './ReviewList';
    import Review from './../review/Review';
export default {
    
    components: {
        Review,
        ReviewList
    },
    data(){
        return {
            post: null,
            loading: false
        }
    },
    created(){
        this.loading = true;
        console.log(this.$route.params.id);
        const request = axios.get(`/api/posts/${this.$route.params.id}`)
        .then(response => {
            this.post = response.data.data;
            this.loading = false;
            });
    },
    filters: {
        turnIntoString(value){
            return (typeof myVar === 'string') ? value : value.toString();
        }
    }
}
</script>