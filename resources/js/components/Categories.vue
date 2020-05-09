<template>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul
      class="navbar-nav mr-auto"
      v-for="category in categories"
      :key="'category' + category.title"
    >
      <li class="nav-item">
          <router-link v-bind:to="{name: 'post-from-category', params:{id:category.id}}" class="text-uppercase">{{ category.title }}</router-link>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <router-link to="/contact" class="text-uppercase">kontakt</router-link>
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
  .nav-item a{
    color: #079100;
  }
</style>