<template>
    <TheHeader/>
    <router-view></router-view>
</template>

<script>
    import TheHeader from '../../components/admin/TheHeader.vue';

    export default {
        components:{
            TheHeader
        }
    }
</script>

<style lang="scss" scoped>

</style>