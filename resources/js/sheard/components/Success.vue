<template>
  <div class="success d-flex align-items-center flex-column">
    <i class="fas fa-check-circle mb-2"></i>
    <h2>{{ information }}</h2>
  </div>
</template>
<script>
export default {
  props: {
    information: String
  },
  created() {
    console.log(this.$route.path);
    setTimeout(() => {
      this.$route.path === "/contact"
        ? this.$router.push({ name: "home", params: "" })
        : this.$router.go();
    }, 2000);
  }
};
</script>
<style scoped>
.success {
  color: green;
  font-size: 10rem;
  /* display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column; */
}
</style>
