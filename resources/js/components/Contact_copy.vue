<template>
    <div>
<form
  id="app"
  @submit="checkForm"
  action="https://vuejs.org/"
  method="post"
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
      id="name"
      v-model="name"
      type="text"
      name="name"
    >
  </p>

  <p>
    <label for="age">Age</label>
    <input
      id="age"
      v-model="age"
      type="number"
      name="age"
      min="0"
    >
  </p>

  <p>
    <label for="movie">Favorite Movie</label>
    <select
      id="movie"
      v-model="movie"
      name="movie"
    >
      <option>Star Wars</option>
      <option>Vanilla Sky</option>
      <option>Atomic Blonde</option>
    </select>
  </p>

<div id="recaptcha-main" class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
  
  <p>
    <input
      type="submit"
      value="Submit"
    >
  </p>

</form>
    </div>
</template>
<script>
export default {

  data(){
    return{
      errors: [],
      name: null,
      age: null,
      movie: null,
      chaptaKey: process.env.CAPTCHA_KEY
    }
  },
  methods:{
    checkForm: function (e) {
      if (this.name && this.age) {
        // return true;
        submit();
      }

      this.errors = [];

      if (!this.name) {
        this.errors.push('Name required.');
      }
      if (!this.age) {
        this.errors.push('Age required.');
      }

      e.preventDefault();
    },
    submit(){

    }
  },

  created() {
    setTimeout(() => {
        grecaptcha.render('recaptcha-main'); // 'recaptcha-main' is the id that was assigned to the widget
    }, 2000);
}
}

</script>