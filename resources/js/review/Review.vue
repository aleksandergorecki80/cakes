<template>
    <div class="review-form">
       <success v-if="success"></success>
       <div v-else>
            <div class="form-group">
                <label for="" class="text-muted">
                    Select the star rating
                </label>
                <star-rating class="fa-2x" v-model="review.rating"></star-rating>
            </div>
            <div class="form-group">
                <label for="content" class="text-muted">Co myślisz o tym przepisie</label>
                <textarea 
                    name="content" 
                    id="" cols="30" rows="10" 
                    class="form-control" 
                    v-model="review.content"
                    v-bind:class="[{'is-invalid' : errorFor('content')}]"
                ></textarea>
                <div 
                    class="invalid-feedback"
                    v-for="(error, index) in errorFor('content')" :key="'content' + index"
                >
                    {{ error }}                
                </div>
            </div>
            <div id="recaptcha-main" class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
            <button class="btn lg btn-success btn-block" 
            @click.prevent ="submit" v-bind:disabled="sending">Submit</button>
       </div>

    </div>
</template>
<script>
import { is422 } from "./../sheard/utility/response";
import validationErrors from "./../sheard/mixins/validationErrors";


export default {
    mixins: [validationErrors],
    data(){
        return {
            review: {
                rating: 5,
                content: null,
                post_id: this.$route.params.id
            },
            error: false,
            sending: false,
            success: false
        };
    },
    created(){
        this.$nextTick(function () {
    grecaptcha.render('recaptcha-main');
})

    },
    methods: {

        // async submit(){
        //     this.errors = null;
        //     this.sending = true;

        //     try{
        //         const result = await (axios.post('/api/reviews', this.review));
        //     } catch (err) {
        //         if(is422(err)){
        //             const errors = err.response.data.errors;
        //              if (errors["content"] && 1 == _.size(errors)) {
        //                 this.errors = errors;
        //                 return;
        //             }
        //         } 
        //     }
        //     this.sending = false;
        //     console.log('jestem tu');
        // }
                
//  TO TEŻ DZIAŁA !!!
        submit(){
            this.errors = null;
            this.sending = true;
            this.success = false;

            axios.post('/api/reviews', this.review)
            .then(response => {
                this.success = 201 == response.status;
            })
            .catch((err)=>{
                if(is422(err)){
                    const errors = err.response.data.errors;
                     if (errors["content"] && 1 == _.size(errors)) {
                        this.errors = errors;
                        return;
                    }
                } 
            })
            .then(()=>(this.sending = false));
         },
    }
}

</script>

<style scoped>
    .review-form {
        padding: 1.25em;
    }
</style>