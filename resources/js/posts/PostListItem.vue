<template>
    <div class="card w-100">
         <div class="card-body">
            <router-link v-bind:to="{ name: 'post', params: {id: id}}">
                <div class="image-container">
                    <img :src="'/storage/cover_images/' + cover_image" alt="">
                </div>
                <h5 class="card-title">{{ title }}</h5>
            </router-link>
                <p class="card-text">{{ summary }}</p>
         </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        summary: String,
        id: Number,
        cover_image: String
    }
};
</script>
<style scoped>
    img {
        width: 100%;
        margin-bottom: 1em;
    }
</style>