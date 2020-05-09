<template>
  <div class="search">
    <input
      class="search-input"
      type="search"
      placeholder="Search"
      aria-label="Search"
      name="search"
      v-on:keyup.enter="submit"
      v-on:keydown="clearMessage"
      v-on:focus="clearMessage"
      v-model="search"
    />

    <router-link v-bind:to="{name:'search', params:{phrase:search}}">
      <button class="search-button" type="submit">
        <i class="fas fa-search"></i>
      </button>
    </router-link>
    <span class="search-message">{{ message }}</span>
  </div>
</template>

<script>

export default {
    
  data() {
    return {
      search: null,
      message: null
    };
  },
  methods: {
      submit(){
          if(this.search == null || this.search == ''){
              this.message = 'Fill in a field.'
          } else {
                this.message = '';
                this.$router.push({ name: 'search', params: { phrase:this.search }})
          }

      },
      clearMessage(){
          this.message = '';
      }
  }
};
</script>
<style scoped>
  
</style>