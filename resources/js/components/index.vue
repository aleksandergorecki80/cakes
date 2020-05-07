<template>
    <div>
        <router-view :key="$route.path"></router-view>
    </div>
</template>

<script>
// import { mapState } from 'vuex';
// export default {
//     computed: mapState({
//         lastSearchComputed: state => state.lastSearch
//     })
// }
</script>