<template>
            <div class="search">
                <input class="search-input" type="search" placeholder="Search" aria-label="Search" name="search" v-model="search">
                <router-link to="/search"><button class="search-button" type="submit" v-on:click="searchInDatabase"><i class="fas fa-search"></i></button></router-link>
                <!-- <button class="search-button" type="submit"><img src="/storage/layout_images/search.svg" alt="Search" class="search-button-img" v-on:click="check"></button> -->
            </div>
</template>

<script>
export default {
    data(){
        return {
            search: null,
        }
    },
    methods: {
        searchInDatabase(){
        const request = axios
            .get(`/api/search?searched=${this.search}`)
            .then(response => {
                this.$store.commit('setPosts', response.data.data)
            });
        }
    }
}
</script>