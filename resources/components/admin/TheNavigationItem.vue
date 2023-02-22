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
    BuildingOfficeIcon,
    BookOpenIcon,
    TagIcon,
    HomeIcon,
    ExclamationCircleIcon,
    UsersIcon,
    AcademicCapIcon ,
    QueueListIcon,
    TableCellsIcon,
    LanguageIcon,
    NewspaperIcon
} from '@heroicons/vue/24/outline'
import { mapActions } from 'vuex'
export default {
    data() {
        return {
            navigation: [
                { name: 'Trang Quản Lý', href: '/admin', icon: HomeIcon },
                { name: 'Người Dùng', href: '/admin/user', icon: UsersIcon },
                { name: 'Sách', href: '/admin/book', icon: BookOpenIcon },
                { name: 'Thể Loại', href: '/admin/category', icon: QueueListIcon },
                { name: 'Nhãn Dán', href: '/admin/tag', icon: TagIcon },
                { name: 'Tác Giả', href: '/admin/author', icon: NewspaperIcon },
                { name: 'Ngành Học', href: '/admin/major', icon: AcademicCapIcon },
                { name: 'Kệ Sách', href: '/admin/bookshelf', icon: TableCellsIcon },
                { name: 'Vai Trò', href: '/admin/role', icon: ExclamationCircleIcon },
                { name: 'Nhà Xuất Bản', href: '/admin/publisher', icon: BuildingOfficeIcon },
                { name: 'Ngôn Ngữ', href: '/admin/language', icon: LanguageIcon },
            ]
        }
    },
    methods:{
        ...mapActions(['getDataTable']),
        changeLink(val){
            const path =val.substring(val.lastIndexOf('/') + 1)
            this.getDataTable({resource:path,page:1})
        }
    }
}
</script>
