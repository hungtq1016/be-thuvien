<template>
    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg" >
        <div class="flex-shrink-0">
            <img class="h-48 w-full object-cover" :src="value.imageUrl" alt="" />
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white dark:bg-zinc-700 p-6 relative group" >
            <button
                class="md:hidden absolute md:top-2 right-2 group-hover:inline p-1 bg-gray-200 dark:bg-white rounded-full hover:rotate-12">
                <p class="sr-only">share</p>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 fill-gray-500 dark:fill-red-300">
                    <path
                        d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z" />
                </svg>
            </button>
            <div class="flex-1">
                <router-link :to="{name: 'BookDetail', params: { slug: value.slug }}" class="mt-2 block">
                    <p class="text-xl font-semibold text-sky-700 dark:text-red-600" >
                        {{ value.title }}
                    </p>
                    <p class="mt-3 text-base text-gray-600 dark:text-gray-300 truncate">
                        {{ value.description }}
                    </p>
                </router-link>
                <p class="text-sm text-gray-400 dark:text-gray-100  font-semibold" >
                    <a :href="value.category.href" class="hover:underline" >{{ value.category.name }}</a >
                </p>
            </div>
            <div class="flex flex-col md:flex-row justify-between md:items-center mt-6 gap-y-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a :href="value.author.href">
                            <span class="sr-only">{{ value.author.name }}</span>
                            <img class="h-10 w-10 rounded-full" :src="value.author.imageUrl" alt="" />
                        </a>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                            <a :href="value.author.href" class="hover:underline">{{ value.author.name }}</a>
                        </p>
                    </div>
                </div>
                <div class="flex space-x-1 text-sm text-gray-500 dark:text-white">
                    <span :comments="value.comments" class="flex items-center gap-x-1">{{ value.comments }}
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-4 fill-sky-500">
                                <path
                                    d="M88.2 309.1c9.8-18.3 6.8-40.8-7.5-55.8C59.4 230.9 48 204 48 176c0-63.5 63.8-128 160-128s160 64.5 160 128s-63.8 128-160 128c-13.1 0-25.8-1.3-37.8-3.6c-10.4-2-21.2-.6-30.7 4.2c-4.1 2.1-8.3 4.1-12.6 6c-16 7.2-32.9 13.5-49.9 18c2.8-4.6 5.4-9.1 7.9-13.6c1.1-1.9 2.2-3.9 3.2-5.9zM0 176c0 41.8 17.2 80.1 45.9 110.3c-.9 1.7-1.9 3.5-2.8 5.1c-10.3 18.4-22.3 36.5-36.6 52.1c-6.6 7-8.3 17.2-4.6 25.9C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.8-2.2 9.6-4.5 14.2-6.8c15.1 3 30.9 4.5 47.1 4.5c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176zM432 480c16.2 0 31.9-1.6 47.1-4.5c4.6 2.3 9.4 4.6 14.2 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.8 2-19-4.6-25.9c-14.2-15.6-26.2-33.7-36.6-52.1c-.9-1.7-1.9-3.4-2.8-5.1C622.8 384.1 640 345.8 640 304c0-94.4-87.9-171.5-198.2-175.8c4.1 15.2 6.2 31.2 6.2 47.8l0 .6c87.2 6.7 144 67.5 144 127.4c0 28-11.4 54.9-32.7 77.2c-14.3 15-17.3 37.6-7.5 55.8c1.1 2 2.2 4 3.2 5.9c2.5 4.5 5.2 9 7.9 13.6c-17-4.5-33.9-10.7-49.9-18c-4.3-1.9-8.5-3.9-12.6-6c-9.5-4.8-20.3-6.2-30.7-4.2c-12.1 2.4-24.7 3.6-37.8 3.6c-61.7 0-110-26.5-136.8-62.3c-16 5.4-32.8 9.4-50 11.8C279 439.8 350 480 432 480z" />
                            </svg></span>
                    </span>
                    <span aria-hidden="true">&middot;</span>
                    <span class="flex items-center gap-x-1">{{ value.rating }}
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4 fill-yellow-500">
                                <path
                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                            </svg></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value']
    }
</script>

<style lang="scss" scoped>

</style>
