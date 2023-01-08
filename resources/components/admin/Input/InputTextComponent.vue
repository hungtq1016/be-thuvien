<template>
    <div>
        <label for="name" class="block text-sm font-medium dark:text-white">Tên</label>
        <div class="mt-1">
            <input type="text" name="name" id="name" v-model="name"
                class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                placeholder="Nhập Tên" aria-describedby="name-description" />
        </div>
    </div>
</template>

<script>
    export default {
        props:['style','title']
    }
</script>
