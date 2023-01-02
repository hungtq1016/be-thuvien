<template>
    <TheHeader />
    <TheAside />
    <div class="content-page bg-dark">
        <div class="container-fluid">
            <router-view></router-view>
        </div>
    </div>
   

</template>

<script>
import TheHeader from '../../components/admin/TheHeader.vue';
import TheAside from '../../components/admin/TheAside.vue';

export default {
    components: {
        TheHeader, TheAside
    }
}
</script>

<style lang="scss" scoped>

</style>