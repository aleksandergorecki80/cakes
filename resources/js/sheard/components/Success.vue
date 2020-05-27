<template>
  <div class="success d-flex align-items-center flex-column">
    <i class="fas fa-check-circle mb-2"></i>
    <h2>{{ information }}</h2>
  </div>
</template>
<script>
export default {
  props: {
    information: String,
    postId: Number
  },
  created() {
    setTimeout(() => {
      this.$route.path === "/contact"
        ? this.$router.push({ name: "home", params: "" })
        : this.$router.push({ name: "post", params: { id: this.postId } });
    }, 2000);
  }
};
</script>
<style scoped>
.success {
  color: green;
  font-size: 10rem;
}
</style>
