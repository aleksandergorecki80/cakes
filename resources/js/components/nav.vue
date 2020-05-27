<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light container">
      <a class="navbar-brand" href="/">
        <img src="/storage/layout_images/logo_BC.png" alt="Logo" class="companyLogo"/>
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
    </nav>
    <div v-if="showCarusel">
      <Carousel v-bind:categories="categories"></Carousel>
    </div>

  </div>
</template>

<script>
import Search from "./Search";
import Categories from "./Categories";
import Carousel from "./Carousel";

export default {
  components: {
    Categories,
    Carousel
  },
  data() {
    return {
      search: null,
      categories: null,
      loading: false
    };
  },
  computed: {
    showCarusel(){
      return this.$route.path == '/';
    }
  },
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
  .navbar-brand {
    margin-right: 40px;
  }
  .companyLogo {
    width: 100%;
  }

  @media(max-width: 540px){
    .navbar-brand {
      width: 70%;
      margin-right: 0px;
    }
  }
</style>