<template>
  <div>
    <success v-if="sucessfulServerResponse" v-bind:information="information"></success>
    <div v-else>
      <form class="auth-form" @submit.prevent="submit">
        <div class="input-group">
          <label for="name">Name</label>

          <input
            type="text"
            class="form-control"
            v-model="contactMessage.name"
            placeholder="Name"
            name="name"
            id="email"
            v-bind:class="[{'is-invalid' : errorFor('name')}]"
          />

          <p
            class="invalid-feedback"
            v-for="(error, index) in errorFor('name')"
            :key="'name' + index"
          >{{ error }}</p>
        </div>

        <div class="input-group">
          <label for="email">email</label>
          <input
            name="email"
            id="email"
            type="text"
            class="form-control"
            v-model="contactMessage.email"
            placeholder="name@domain.com"
            v-bind:class="[{'is-invalid' : errorFor('email')}]"
          />

          <p
            class="invalid-feedback"
            v-for="(error, index) in errorFor('email')"
            :key="'name' + index"
          >{{ error }}</p>
        </div>

        <div class="input-group">
          <label for="content">Treść</label>
          <textarea
            name="content"
            id
            cols="30"
            rows="10"
            class="form-control"
            v-model="contactMessage.content"
            v-bind:class="[{'is-invalid' : errorFor('content')}]"
          ></textarea>

          <p
            class="invalid-feedback"
            v-for="(error, index) in errorFor('content')"
            :key="'content' + index"
          >{{ error }}</p>
        </div>

        <div class="input-group">
          <vue-recaptcha
            ref="recaptcha"
            @verify="onCaptchaVerified"
            @expired="onCaptchaExpired"
            size="invisible"
            sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"
          ></vue-recaptcha>
          <button
            class="btn lg btn-success btn-block"
            @click.prevent="submit"
            v-bind:disabled="sending"
          >Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import VueRecaptcha from "vue-recaptcha";
import validationErrors from "./../sheard/mixins/validationErrors";
import { is422 } from "./../sheard/utility/response";

export default {
  mixins: [validationErrors],
  components: {
    "vue-recaptcha": VueRecaptcha
  },
  data() {
    return {
      contactMessage: {
        email: "",
        name: "",
        content: ""
      },
      sending: null,
      sucessfulServerResponse: "",
      information: "Your message has been sent.",
      errors: null
    };
  },
  methods: {
    submit: function() {
      // this.status = "submitting";
      this.$refs.recaptcha.execute();
    },
    onCaptchaVerified(recaptchaToken) {
      this.errors = null;
      this.sending = true;
      this.success = false;

      // const self = this;
      this.status = "submitting";
      this.$refs.recaptcha.reset();
      axios
        .post("/api/send-contact", {
          email: this.contactMessage.email,
          name: this.contactMessage.name,
          content: this.contactMessage.content,
          recaptchaToken: recaptchaToken
        })
        .then(response => {
          this.sucessfulServerResponse = response.data.message;
        })
        .catch(err => {
          console.log(err);
          this.errors = err.response.data.errors;
        })
        .then(() => (this.sending = false));
      //     .catch(err => {
      //       this.serverError = getErrorMessage(err);

      //       //helper to get a displayable message to the user
      //       function getErrorMessage(err) {
      //         let responseBody;
      //         responseBody = err.response;
      //         if (!responseBody) {
      //           responseBody = err;
      //         } else {
      //           responseBody = err.response.data || responseBody;
      //         }
      //         return responseBody.message || JSON.stringify(responseBody);
      //       }
      //     })
      //     .then(() => {
      //       this.status = "";
      //     });
      // },
    },
    onCaptchaExpired: function() {
      this.$refs.recaptcha.reset();
    }
  }
};
</script>
<style  scoped>
.input-group {
  flex-direction: column;
  margin-bottom: 10px;
}
</style>