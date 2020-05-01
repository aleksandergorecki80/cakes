<template>
    <div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light container">
        <a class="navbar-brand" href="/"><img src="/storage/layout_images/logo_BC.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">

                        <router-link to="/">Home</router-link>

            </li>
            </ul>
            <ul class="navbar-nav mr-auto" v-for="category in categories" :key="'category' + category.title">
                <li class="nav-item">
                        <router-link to="/">{{ category.title }}</router-link>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/contact">Kontakt</a>
            </li>
            </ul>
            
            <div class="search">
                <input class="search-input" type="search" placeholder="Search" aria-label="Search" name="search" v-model="search">
                <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                <!-- <button class="search-button" type="submit"><img src="/storage/layout_images/search.svg" alt="Search" class="search-button-img" v-on:click="check"></button> -->
            </div>
            
        </div>
        </nav>

    </div>
</template>

<script>
export default {
    data(){
        return {
            search: null,
            categories: null,
            loading: false
        }
    },
    methods: {
        check(){
            alert('I will search for it');
        }
    },
    created(){
        this.loading = true;
        const request = axios
        .get("/api/loadmenu")
        .then(response => {
            this.categories = response.data.data;
            this.loading = false;
            });
    }
}
</script>

<style scoped>
    .search-button-img {
        width: 10px;
    }
</style>