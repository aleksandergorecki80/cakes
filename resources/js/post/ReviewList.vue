<template>
    <div class="d-none d-md-block review-section">
        <h6 class="text-uppercase text-secondary font-weight-bolder pt-4">Review list</h6>
        <hr />
        <div v-if="loading">
            Data is loading...
        </div>
            <div v-else>
            <div class="border-bottom" v-for="(review, index) in reviews" :key="index">
                <div class="row pt-4">
                    <div class="col-md-6">Imie i nazwisko</div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <StarRating v-bind:rating="review.rating"></StarRating>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">Added {{ review.created_at | fromNow }}.</div>
                </div>
                <div class="row pb-4 pt-4">
                    <div class="col-md-12">{{ review.content }} </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
// import moment from "moment";

export default {
    props: {
        postId: String
    },
    data(){
        return {
            loading: false,
            reviews: null
        }
    },
    created() {
        this.loading = true;
        axios.get(`/api/posts/${this.postId}/reviews`)
            .then(response =>(this.reviews = response.data.data))
            .then(this.loading = false);
                        

    },

    
    // filters: {
    //     fromNow(value){
    //         return moment(value).fromNow();
    //     }
    // }
}
</script>
<style scoped>
    .review-section {
        padding: 1.25rem;
    }
</style>