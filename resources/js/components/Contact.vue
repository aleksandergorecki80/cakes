<template>
    <div>
<form
  id="app"
  @submit="checkForm"
>

  <p v-if="errors.length">
    <b>Please correct the following error(s):</b>
    <ul>
      <li v-for="error in errors" :key="'err' + error">{{ error }}</li>
    </ul>
  </p>

  <p>
    <label for="name">Name</label>
    <input
      v-model="message.name"
      type="text"
      name="name"
    >
  </p>

  <vue-recaptcha 
    sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" 
    @expired="onCaptchaExpired"
    :loadRecaptchaScript="true">
  </vue-recaptcha>
  <p>
    <input
      @click.prevent ="submit"
      type="submit"
      value="Submit"
    >
  </p>

</form>
    </div>
</template>
<script>
import { is422 } from "./../sheard/utility/response";
import VueRecaptcha from 'vue-recaptcha';
export default {
  components: { VueRecaptcha },
  data(){
    return{
      message: {
        name: null,
        recaptchaToken: null
      },
      errors: [],
      chaptaKey: process.env.CAPTCHA_KEY
    }
  },
  methods:{
    checkForm: function (e) {
      e.preventDefault();
      if (this.message.name) {
        // return true;
        this.submit();
      }

      this.errors = [];

      if (!this.name) {
        this.errors.push('Name required.');
      }
     
    },
    onCaptchaVerified: function (recaptchaToken) {
            this.errors = [];

            axios.post('/api/send-contact', {
              recaptchaToken: recaptchaToken
            })
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
    }
  },

  created() {
    //
}
}

</script>