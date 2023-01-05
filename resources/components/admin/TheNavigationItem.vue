<template>
    <router-link v-for="item in navigation" :key="item.name" :to="item.href" class="text-slate-900 dark:text-gray-300 hover:dark:bg-gray-700 hover:text-white hover:bg-sky-600 hover:dark:text-red-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
        <component :is="item.icon" class="text-gray-400 dark:group-hover:text-red-800 group-hover:text-slate-100 mr-3 flex-shrink-0 h-6 w-6" aria-hidden="true" />
        {{ item.name }}
    </router-link>
</template>

<script>
import {
    CalendarIcon,
    ChartBarIcon,
    TagIcon,
    HomeIcon,
    InboxIcon,
    UsersIcon,
    QueueListIcon
} from '@heroicons/vue/24/outline'
export default {
    data() {
        return {
            navigation: [
                { name: 'Trang Quản Trị', href: '/admin', icon: HomeIcon },
                { name: 'Thể Loại', href: '/admin/category', icon: QueueListIcon },
                { name: 'Nhãn Dán', href: '/admin/tag', icon: TagIcon },
                { name: 'Calendar', href: '/admin/log', icon: CalendarIcon },
                { name: 'Documents', href: '/admin/author', icon: InboxIcon },
                { name: 'Reports', href: '/admin/abc', icon: ChartBarIcon },
            ]
        }
    }
}
</script>

<style lang="scss" scoped>

</style>