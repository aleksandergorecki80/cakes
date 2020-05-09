<template>
  <div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            class="d-block w-100"
            src="/storage/slider_images/ciasta_1587996479.jpg"
            alt="First slide"
          />
          <router-link to="/categories/2">
            <div class="description">
              <h3>Torty</h3>
              <p>Kolorowe torty na każdą okazję</p>
            </div>
          </router-link>
        </div>
        <div class="carousel-item">
          <img
            class="d-block w-100"
            src="/storage/slider_images/torty_1588132191.jpg"
            alt="Second slide"
          />
          <router-link to="categories/1">
            <div class="description">
              <h3>Ciasta</h3>
              <p>Pyszne ciasta na codzień i od święta</p>
            </div>
          </router-link>
        </div>
        <div class="carousel-item">
          <img
            class="d-block w-100"
            src="/storage/slider_images/torty_1588132191.jpg"
            alt="Third slide"
          />
          <router-link to="categories/3">
            <div class="description">
              <h3>Babeczki i ciastka</h3>
              <p>W sam raz do kawy i na przekąskę</p>
            </div>
          </router-link>
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    categories: Array
  },
computed: {
    title() {
      return this.categories[0].title;
  },
  // etc...
}
};
</script>
<style scoped>
  .carousel{
    margin-bottom: 20px;
  }
   .description {
        color: white;
        position: absolute;
        top: 80%;
        left: 20%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.4);
        padding: 20px 50px 10px 20px;
    }
</style>