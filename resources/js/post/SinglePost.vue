<template>
  <div>
    <div v-if="loading">Data is loading...</div>
    <div v-else class="row flex-lg-row flex-md-row">
      <div class="col-md-8 pb-4 col-sm-1">
        <div class="card">
          <div class="card-body">
            <div>
              <h3>{{ post.title }}</h3>
              <hr />
              <p v-html="post.summary"></p>
              <img :src="'/storage/cover_images/' + post.cover_image" alt />
              <p v-html="post.body"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 pb-4 col-sm-1">
        <div class="card">
          <div class="card-body">
            <h4>składniki</h4>
            <hr />
            <p v-html="post.ingredients" class="ingredients-list"></p>
          </div>
        </div>
      </div>
    
    <div class="row">
        <div class="col-md-8 pb-4 col-sm-1">
            <ReviewList v-bind:post-id="this.$route.params.id | turnIntoString"></ReviewList>
            <router-link v-bind:to="{name: 'review', params:{id:post.id}}" class="btn btn-success btn-block text-uppercase">Skomentuj</router-link>
        </div>
    </div>
  </div>
  </div>
</template>

<script>
import ReviewList from "./ReviewList";

export default {
  components: {
    ReviewList
  },
  data() {
    return {
      post: null,
      loading: false
    };
  },
  created() {
    this.loading = true;
    const request = axios
      .get(`/api/posts/${this.$route.params.id}`)
      .then(response => {
        this.post = response.data.data;
        this.loading = false;
      });
  },
  filters: {
    turnIntoString(value) {
      return typeof myVar === "string" ? value : value.toString();
    }
  }
};
</script>
<style scoped>
h3,
h4 {
  text-transform: uppercase;
  color: #079100;
  padding: 20px 0 0 20px;
}
h3 {
  font-size: xx-large;
}
h4 {
  font-size: x-large;
}

img {
  margin: 0 0 20px 0;
  width: 100%;
  padding: 0 20px;
}
p {
  padding: 20px;
}
hr {
    padding: 0;
    margin: 0;
}
</style>