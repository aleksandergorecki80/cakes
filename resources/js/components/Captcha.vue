<template>
  <div>
    <form class="auth-form" @submit.prevent="submit">
              <div class="input-group">
                <label for="email">email
                </label>
                <input v-model="email" required placeholder="name@domain.com" class="" name="email"
                  id="email"/>
              </div>
                <div class="input-group">
                <label for="name">name
                </label>
                <input v-model="name" required placeholder="Name" class="" name="name"
                  id="email"/>
              </div>
              <div>
                <textarea 
                    name="content" 
                    id="" cols="30" rows="10" 
                    class="form-control" 
                    v-model="content"
                    required
                ></textarea>
              </div>
              
              <div class="input-group">
                <vue-recaptcha
                  ref="recaptcha"
                  @verify="onCaptchaVerified"
                  @expired="onCaptchaExpired"
                  size="invisible"
                  sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"
                  
                  >
                </vue-recaptcha>
                <button :disabled="status==='submitting'" type="submit" class="button">sign up</button>
              </div>
              <div v-cloak class="">
                <div v-show="serverError">
                  {{serverError}}
                </div>
              </div>
            </form>
  </div>
</template>

<script>
import VueRecaptcha from 'vue-recaptcha';
export default {
    components: {
    'vue-recaptcha': VueRecaptcha
  },
  methods: {
    submit: function () {
      // this.status = "submitting";
      this.$refs.recaptcha.execute();
    },
    onCaptchaVerified: function (recaptchaToken) {
        console.log('onCaptchaVerified kki');
      const self = this;
      self.status = "submitting";
      self.$refs.recaptcha.reset();
      axios.post("/api/send-contact", {
        email: self.email,
        name: self.name,
        content: self.content,
        recaptchaToken: recaptchaToken
      }).then((response) => {
        self.sucessfulServerResponse = response.data.message;
      }).catch((err) => {
        self.serverError = getErrorMessage(err);


        //helper to get a displayable message to the user
        function getErrorMessage(err) {
          let responseBody;
          responseBody = err.response;
          if (!responseBody) {
            responseBody = err;
          }
          else {
            responseBody = err.response.data || responseBody;
          }
          return responseBody.message || JSON.stringify(responseBody);
        }

      }).then(() => {
        self.status = "";
      });


    },
    onCaptchaExpired: function () {
      this.$refs.recaptcha.reset();
    }
  },
  data() {
    return {
      email: "",
         name: "",
         content: "",
      status: "",
      sucessfulServerResponse: "",
      serverError: ""
    };
  }

  
}
</script>