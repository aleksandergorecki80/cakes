<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light container">
      <a class="navbar-brand" href="/">
        <img src="/storage/layout_images/logo_BC.png" alt="Logo" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <Categories v-bind:categories="categories"></Categories>

      <!-- <ul class="navbar-nav mr-auto" v-for="category in categories" :key="'category' + category.title">
                <li class="nav-item">
                        <router-link to="category.id"> {{ category.title   }}</router-link>
                </li>
      </ul>-->
    </nav>
  </div>
</template>

<script>
import Search from "./Search";
import Categories from "./Categories";

export default {
  components: {
    Categories
  },
  data() {
    return {
      search: null,
      categories: null,
      loading: false
    };
  },
  // methods: {
  //     check(){
  //         // alert('I will search for it');
  //                 // console.log(this.$store);
  //         this.$store.commit('setLastSearch', {searchName: this.search});
  //     }
  // },
  created() {
    this.loading = true;
    const request = axios.get("/api/loadmenu").then(response => {
      this.categories = response.data.data;
      this.loading = false;
    });
  }
};
</script>

<style scoped>
.search-button-img {
  width: 10px;
}
</style>