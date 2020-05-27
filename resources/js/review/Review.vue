<template>
  <div class="review-form">
    <success v-if="success" v-bind:information="information" v-bind:post-id="this.$route.params.id"></success>
    <div v-else>
      <div class="form-group">
        <label for class="text-muted">Select the star rating</label>
        <star-rating class="fa-2x" v-model="review.rating"></star-rating>
      </div>
      <div class="form-group">
        <label for="content" class="text-muted">Co myślisz o tym przepisie</label>
        <textarea
          name="content"
          id
          cols="30"
          rows="10"
          class="form-control"
          v-model="review.content"
          v-on:keyup="removeInvalid"
          v-bind:class="[{'is-invalid' : errorFor('content')}]"
        ></textarea>
        <div
          class="invalid-feedback"
          v-for="(error, index) in errorFor('content')"
          :key="'content' + index"
        >{{ error }}</div>
      </div>
      <vue-recaptcha
        ref="recaptcha"
        @verify="onCaptchaVerified"
        @expired="onCaptchaExpired"
        size="invisible"
            v-bind:sitekey="sitekey"
      ></vue-recaptcha>
      <button
        class="btn lg btn-success btn-block"
        @click.prevent="submit"
        v-bind:disabled="sending"
      >Submit</button>
    </div>
  </div>
  
</template>
<script>
import VueRecaptcha from "vue-recaptcha";
import { is422 } from "./../sheard/utility/response";
import validationErrors from "./../sheard/mixins/validationErrors";

export default {
  mixins: [validationErrors],
  components: {
    "vue-recaptcha": VueRecaptcha
  },
  data() {
    return {
      review: {
        rating: 5,
        content: null,
        post_id: this.$route.params.id
      },
      sitekey: "6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI",
      errors: null,
      sending: false,
      success: false,
      information: "Your review has been posted."
    };
  },
  methods: {
    removeInvalid() {
      if (this.review.content.length > 2) {
        this.errors = null;
      }
    },

     submit() {
      this.$refs.recaptcha.execute();
    },
    onCaptchaVerified(recaptchaToken) {
      this.errors = null;
      this.sending = true;
      this.success = false;

      axios
        .post("/api/reviews", {
          rating: this.review.rating,
          content: this.review.content,
          post_id: this.review.post_id,
          recaptchaToken: recaptchaToken
        })
        .then(response => {
          this.success = 201 == response.status;
        })
        .catch(err => {
          if (is422(err)) {
            const errors = err.response.data.errors;
            if (errors["content"] && 1 == _.size(errors)) {
              this.errors = errors;
              return;
            }
          }
        })
        .then(() => (this.sending = false));
    },
    onCaptchaExpired() {
      this.$refs.recaptcha.reset();
    }
  }
};
</script>

<style scoped>
.review-form {
  padding: 1.25em;
}

</style>