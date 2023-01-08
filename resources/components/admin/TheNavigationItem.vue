<template>
    <router-link v-for="item in navigation" :key="item.name" :to="item.href" @click="changeLink(item.href)"
    class="text-slate-900 dark:text-gray-300 hover:dark:bg-gray-700 hover:text-white hover:bg-sky-600 hover:dark:text-red-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
        <component :is="item.icon"
        class="text-gray-400 dark:group-hover:text-red-800 group-hover:text-slate-100 mr-3 flex-shrink-0 h-6 w-6" aria-hidden="true" />
        {{ item.name }}
    </router-link>
</template>

<script>
import {
    VideoCameraIcon,
    FilmIcon,
    TagIcon,
    HomeIcon,
    PaintBrushIcon,
    UsersIcon,
    QueueListIcon
} from '@heroicons/vue/24/outline'
import { mapActions, mapMutations } from 'vuex'
export default {
    data() {
        return {
            navigation: [
                { name: 'Trang Quản Lý', href: '/admin', icon: HomeIcon },
                { name: 'Thể Loại', href: '/admin/category', icon: QueueListIcon },
                { name: 'Nhãn Dán', href: '/admin/tag', icon: TagIcon },
                { name: 'Diễn Viên', href: '/admin/actor', icon: VideoCameraIcon },
                { name: 'Đạo Diễn', href: '/admin/director', icon: PaintBrushIcon },
                { name: 'Phim', href: '/admin/movie', icon: FilmIcon },
            ]
        }
    },
    methods:{
        ...mapMutations(['SET_RESOURCE']),
        ...mapActions(['getData','getDataLabel']),
        changeLink(val){
            const path =val.substring(val.lastIndexOf('/') + 1)
            this.SET_RESOURCE(path)
            this.getData({page:1})
            this.getDataLabel()
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
