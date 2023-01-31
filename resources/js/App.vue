<template>
        <router-view></router-view>
</template>

<script>
import { useDark } from '@vueuse/core';
const isDark = useDark();
    export default {
        name: 'App',
        watch: {
        $route: {
            immediate: true,
            handler(to, from) {
                document.title = to.meta.title+' | H Phim';
            }
        },
    }
    }
</script>

<style lang="scss" scoped>

</style>
