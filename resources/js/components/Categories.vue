<template>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <router-link to="/">Home</router-link>
      </li>
    </ul>
    <ul
      class="navbar-nav mr-auto"
      v-for="category in categories"
      :key="'category' + category.title"
    >
      <li class="nav-item">
          <router-link v-bind:to="{name: 'post-from-category', params:{id:category.id}}" >{{ category.title }}</router-link>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/contact">Kontakt</a>
      </li>
    </ul>
    <Search></Search>
  </div>
</template>

<script>
import Search from "./Search";
export default {
  components: {
    Search
  },
  props: {
    categories: Array
  },
  methods: {
    //   getPostsFromOneCategory(id){
    //      const request = axios
    //      .get(`/api/categories/${id}`)
    //      .then(response =>{
    //         this.$store.commit('setPosts', response.data.data)
    //      });
    //   },
  }
};
</script>
<style scoped>
    .btn {
        background-color: #f8fafc;
        border: none;
    }
    .btn:focus,.btn:active {
        outline: none !important;
         box-shadow: none;
}
</style>