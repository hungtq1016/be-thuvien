<template>
    <router-link v-for="item in navigation" :key="item.name" :to="item.href" class="text-gray-300 hover:bg-gray-700 hover:text-red-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
        <component :is="item.icon" class="text-gray-400 group-hover:text-red-800 mr-3 flex-shrink-0 h-6 w-6" aria-hidden="true" />
        {{ item.name }}
    </router-link>
</template>

<script>
import {
    CalendarIcon,
    ChartBarIcon,
    FolderIcon,
    HomeIcon,
    InboxIcon,
    UsersIcon,
} from '@heroicons/vue/24/outline'
export default {
    data() {
        return {
            navigation: [
                { name: 'Dashboard', href: '/admin', icon: HomeIcon },
                { name: 'Team', href: '/admin/users', icon: UsersIcon },
                { name: 'Projects', href: '/admin/movies', icon: FolderIcon },
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