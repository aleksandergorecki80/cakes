<template>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul
      class="navbar-nav mr-auto align-items-sm-end align-items-end"
      v-for="category in categories"
      :key="'category' + category.title"
    >
      <li class="nav-item">
        <router-link
          v-bind:to="{name: 'post-from-category', params:{id:category.id}}"
          class="text-uppercase"
        >{{ category.title }}</router-link>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto align-items-sm-end align-items-end">
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
  }
};
</script>
<style scoped>
.btn {
  background-color: #f8fafc;
  border: none;
}
.btn:focus,
.btn:active {
  outline: none !important;
  box-shadow: none;
}
.nav-item a {
  color: #079100;
}
</style>