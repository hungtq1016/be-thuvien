<template>
    <div class="mx-auto px-4 sm:px-6 md:px-8 dark:bg-zinc-700 bg-white  rounded-lg">
        <h1 class="text-2xl font-semibold dark:text-white text-slate-900 py-4 upper case">
            {{ this.title.title }}
        </h1>
    </div>
</template>

<script>
export default {
    props: ['title']
}
</script>

<style lang="scss" scoped>

</style>