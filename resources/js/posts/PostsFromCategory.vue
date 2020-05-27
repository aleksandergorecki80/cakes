<template>
  <div>
    <div v-if="loading">Data is loading...</div>
    <div v-else>
      <div class="row mb-4" v-for="row in rows" :key="'row' + row">
        <div
          class="col d-flex align-items-stretch"
          v-for="(post, column) in postsInRow(row)"
          :key="'row' + row + column"
        >
          <PostListItem v-bind="post"></PostListItem>
        </div>
        <div class="col" v-for="p in placeholderInRow(row)" :key="'placeholder' + row + p"></div>
      </div>
    </div>
  </div>
</template>

<script>
import PostListItem from "./PostListItem";
export default {
  components: {
    PostListItem
  },
  data() {
    return {
      posts: null,
      loading: false,
      columns: 3,
      id: null
    };
  },
  computed: {
    rows() {
      return this.posts === null
        ? 0
        : Math.ceil(this.posts.length / this.columns);
    }
  },
  methods: {
    postsInRow(row) {
      return this.posts.slice((row - 1) * this.columns, row * this.columns);
    },
    placeholderInRow(row) {
      return this.columns - this.postsInRow(row).length;
    },
    getWindowWidth(event) {
      if (document.documentElement.clientWidth < 576) {
        this.columns = 1;
      } else if (document.documentElement.clientWidth < 768) {
        this.columns = 2;
      } else {
        this.columns = 3;
      }

      this.windowWidth = document.documentElement.clientWidth;
    }
  },
  beforeCreate() {
    this.id = this.$route.params.id;
  },
  created() {
    this.loading = true;
    const request = axios
      .get(`/api/categories/${this.$route.params.id}`)
      .then(response => {
        this.posts = response.data.data;
        this.loading = false;
      });
  },

  mounted() {
    this.id = null;
    this.$nextTick(function() {
      window.addEventListener("resize", this.getWindowWidth);
      this.getWindowWidth();
    });
  }
};
</script>