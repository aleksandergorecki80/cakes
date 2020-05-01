<template>
    <div class="card w-100">
         <div class="card-body">
            <router-link v-bind:to="{ name: 'post', params: {id: id}}">
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
        id: Number
    }
};
</script>