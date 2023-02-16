<template>
    <div class="px-1 md:px-2 lg:px-0 py-4 bg-sky-200 dark:bg-red-500">
        <div class="flex mx-auto max-w-7xl items-center justify-between">
            <router-link to="/" class="!bg-transparent">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company" />
            </router-link>
            <div class="flex gap-x-2">
                <router-link to="/login" class="flex items-center group rounded-full bg-white max-h-9">
                    <span class="hidden group-hover:inline duration-500 ml-2.5 font-semibold">Đăng Nhập</span>
                    <span class="p-2.5 bg-white rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4">
                            <path
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                        </svg>
                    </span>
                </router-link>
                <router-link to="/login?action=register" class="flex items-center group rounded-full bg-white max-h-9">
                    <span class="hidden group-hover:inline duration-500 ml-2.5 font-semibold">Đăng Ký</span>
                    <span class="p-2.5 bg-white rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">
                            <path
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                        </svg> </span>
                </router-link>
                <div>
                    <Switch v-model="isDark" :class="isDark ? 'bg-black' : 'bg-sky-100'" @click="useToggle(isDark)"
                        class="relative inline-flezx h-9 w-[74px] shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
                        <span class="sr-only">Toggle Dark</span>
                        <span aria-hidden="true" :class="isDark ? 'translate-x-9' : 'translate-x-0'"
                            class="pointer-events-none h-8 w-[34px] transform rounded-full bg-white shadow-lg ring-0 transition duration-200 ease-in-out flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4" v-if="isDark"><path d="M223.5 32C100 32 0 132.3 0 256S100 480 223.5 480c60.6 0 115.5-24.2 155.8-63.4c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6c-96.9 0-175.5-78.8-175.5-176c0-65.8 36-123.1 89.3-153.3c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 fill-yellow-500" v-else><path d="M361.5 1.2c5 2.1 8.6 6.6 9.6 11.9L391 121l107.9 19.8c5.3 1 9.8 4.6 11.9 9.6s1.5 10.7-1.6 15.2L446.9 256l62.3 90.3c3.1 4.5 3.7 10.2 1.6 15.2s-6.6 8.6-11.9 9.6L391 391 371.1 498.9c-1 5.3-4.6 9.8-9.6 11.9s-10.7 1.5-15.2-1.6L256 446.9l-90.3 62.3c-4.5 3.1-10.2 3.7-15.2 1.6s-8.6-6.6-9.6-11.9L121 391 13.1 371.1c-5.3-1-9.8-4.6-11.9-9.6s-1.5-10.7 1.6-15.2L65.1 256 2.8 165.7c-3.1-4.5-3.7-10.2-1.6-15.2s6.6-8.6 11.9-9.6L121 121 140.9 13.1c1-5.3 4.6-9.8 9.6-11.9s10.7-1.5 15.2 1.6L256 65.1 346.3 2.8c4.5-3.1 10.2-3.7 15.2-1.6zM160 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"/></svg>
                        </span>
                    </Switch>
                </div>
            </div>
        </div>
    </div>

    <Popover class=" bg-white dark:bg-zinc-900">
        <div class="mx-auto max-w-7xl px-1 md:px-2 lg:px-0">
            <div class="flex items-center py-2 md:pb-0 md:justify-between md:gap-x-10 gap-x-2">
                <div class="-my-2 -mr-2 md:hidden">
                    <PopoverButton
                        class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Open menu</span>
                        <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                    </PopoverButton>
                </div>
                <PopoverGroup as="nav" class="hidden md:flex">
                    <div v-for="item in navItems" :key="item.title"
                        class="border-b-2 py-2 px-5 hover-link duration-500 nav">
                        <router-link :to="item.link">
                            <Popover class="relative" v-slot="{ open }" v-if="item.subNav != null">
                                <PopoverButton
                                    :class="[open ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-300 dark:hover:text-white', 'group inline-flex items-center rounded-md text-base font-medium hover:text-gray-900 dark:hover:text-gray-300 focus:outline-none focus:ring-0']">
                                    <span>{{ item.title }}</span>
                                    <ChevronDownIcon
                                        :class="[open ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-300 dark:hover:text-white', 'ml-2 h-5 w-5 group-hover:text-gray-900 dark:group-hover:text-gray-300']"
                                        aria-hidden="true" />
                                </PopoverButton>

                                <transition enter-active-class="transition ease-out duration-200"
                                    enter-from-class="opacity-0 translate-y-1"
                                    enter-to-class="opacity-100 translate-y-0"
                                    leave-active-class="transition ease-in duration-150"
                                    leave-from-class="opacity-100 translate-y-0"
                                    leave-to-class="opacity-0 translate-y-1">
                                    <PopoverPanel
                                        class="absolute z-50 mt-3 w-36 transform px-2 sm:px-0 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2">
                                        <div
                                            class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                            <div class="relative grid gap-6 bg-white dark:bg-zinc-900 px-2 py-4 sm:p-4">
                                                <router-link :to="{ name: 'RequestBook', params: { slug: subitem.slug },query:{title:subitem.title}}"
                                                     v-for="subitem in item.subNav"
                                                    :key="subitem.title"
                                                    class="text-base font-medium text-gray-900 dark:text-gray-300 -m-3 flex items-start rounded-lg p-3 hover:bg-gray-50 dark:hover:bg-gray-700 dark:hover:text-white sub-nav">{{
                                                        subitem.title
                                                    }}</router-link>

                                            </div>
                                            <span class="block bg-white dark:bg-gray-900">
                                                <router-link :to="item.link"
                                                    class="flow-root rounded-md p-3 transition duration-150 ease-in-out !bg-gray-100 dark:!bg-zinc-700 focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50">
                                                    <span class="text-sm font-medium text-sky-600 dark:text-red-600">
                                                        Xem thêm
                                                    </span>
                                                </router-link>
                                            </span>
                                        </div>
                                    </PopoverPanel>
                                </transition>
                            </Popover>
                            <span to="#" class="text-base font-medium !bg-white dark:!bg-zinc-900 !text-gray-500 hover:!text-gray-900 dark:!text-gray-300 dark:hover:!text-white"
                                v-else>{{ item.title }}</span>
                        </router-link>
                    </div>
                </PopoverGroup>

                <div class="relative max-w-lg md:mb-2 flex-auto min-h-[40px]">
                    <div class="flex items-center justify-end" :class="{ 'hidden': isSearchOpen }">
                        <select id="input" v-model="selected"
                            class="rounded-l-full focus:ring-0 focus:outline-none border-0 bg-gray-100">
                            <option value="all">Tất Cả</option>
                            <option value="book">Sách</option>
                            <option value="category">Thể Loại</option>
                            <option value="author">Tác Giả</option>
                        </select>
                        <input type="text" name="search" id="search" autocomplete="off"
                            placeholder="Tìm sách, tác giả, văn học..."
                            class="rounded-r-full bg-gray-100 border-none pr-5 py-2 md:py-2.5 focus:ring-0 sm:text-sm w-full max-w-xs" />
                    </div>
                    <div class="absolute top-1/2 -translate-y-1/2 right-0">
                        <button
                            class="inline-flex items-center text-sm font-medium text-gray-400 p-2.5 rounded-full bg-gray-100"
                            @click="this.isSearchOpen = !isSearchOpen">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400 " fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="absolute bg-white p-7" v-show="isOpen">
                        <div v-for="item in solutions" :key="item.name"
                            class="-m-3 flex items-center rounded-lg p-2 transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center text-white sm:h-12 sm:w-12">
                                <component :is="item.icon" class="h-6 w-6 flex-shrink-0 text-indigo-600"
                                    aria-hidden="true" />
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ item.name }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ item.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95"
            enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in"
            leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <PopoverPanel focus class="absolute inset-x-0 top-0 origin-top-right transform p-2 transition md:hidden">
                <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                    <div class="px-5 pt-5 pb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <img class="h-8 w-auto"
                                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                                    alt="Your Company" />
                            </div>
                            <div class="-mr-2">
                                <PopoverButton
                                    class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <span class="sr-only">Close menu</span>
                                    <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                                </PopoverButton>
                            </div>
                        </div>
                        <div class="mt-6">
                            <nav class="grid gap-y-8">
                                <a v-for="item in solutions" :key="item.name" :href="item.href"
                                    class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
                                    <component :is="item.icon" class="h-6 w-6 flex-shrink-0 text-indigo-600"
                                        aria-hidden="true" />
                                    <span class="ml-3 text-base font-medium text-gray-900">{{ item.name }}</span>
                                </a>
                            </nav>
                        </div>
                    </div>
                    <div class="space-y-6 py-6 px-5">
                        <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">Pricing</a>

                            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">Docs</a>
                            <a v-for="item in resources" :key="item.name" :href="item.href"
                                class="text-base font-medium text-gray-900 hover:text-gray-700">{{ item.name }}</a>
                        </div>
                        <div>
                            <a href="#"
                                class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Sign
                                up</a>
                            <p class="mt-6 text-center text-base font-medium text-gray-500">
                                Existing customer?
                                {{ ' ' }}
                                <a href="#" class="text-indigo-600 hover:text-indigo-500">Sign in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </PopoverPanel>
        </transition>
    </Popover>
</template>
<script>
import { Popover, PopoverButton, PopoverGroup, PopoverPanel, Switch } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'
import { ArrowPathIcon, Bars3Icon, BookmarkSquareIcon, CalendarIcon, ChartBarIcon, CursorArrowRaysIcon, LifebuoyIcon, PhoneIcon, PlayIcon, ShieldCheckIcon, Squares2X2Icon, XMarkIcon, } from '@heroicons/vue/24/outline'
import { useDark, useToggle } from '@vueuse/core';
import '../../../css/router.css';

export default {
    data() {
        return {
            isDark: useDark(),
            selected: 'all',
            isOpen: false,
            isSearchOpen: true,
            solutions: [{ name: 'Analytics', description: 'Get a better understanding of where your traffic is coming from.', href: '#', icon: ChartBarIcon, }, { name: 'Engagement', description: 'Speak directly to your customers in a more meaningful way.', href: '#', icon: CursorArrowRaysIcon, }, { name: 'Security', description: "Your customers' data will be safe and secure.", href: '#', icon: ShieldCheckIcon }, { name: 'Integrations', description: "Connect with third-party tools that you're already using.", href: '#', icon: Squares2X2Icon, }, { name: 'Automations', description: 'Build strategic funnels that will drive your customers to convert', href: '#', icon: ArrowPathIcon, },],
            callsToAction: [{ name: 'Watch Demo', href: '#', icon: PlayIcon }, { name: 'Contact Sales', href: '#', icon: PhoneIcon },],
            navItems: [
                {
                    title: 'Trang Chủ',
                    link: '/',
                    subNav: null,
                },
                {
                    title: 'Thể Loại',
                    link: '/category',
                    subNav: [
                        {
                            title: 'Hành Động',
                            slug: 'action'
                        },
                        {
                            title: 'Phiêu Lưu',
                            slug: 'avan'
                        },
                        {
                            title: 'Cách Mạng',
                            slug: 'casc'
                        }
                    ]
                },
                {
                    title: 'Thơ',
                    link: '/poem',
                    subNav: [
                        {
                            title: 'Lục Bát',
                            slug: '/poem/action'
                        },
                        {
                            title: 'Hiện Đại',
                            slug: '/poem/action'
                        },
                        {
                            title: 'Cổ Điển',
                            slug: '/poem/action'
                        }
                    ]
                },
                {
                    title: 'Văn Học',
                    link: '/literality',
                    subNav: null
                },
                {
                    title: 'Thông Tin',
                    link: 'about',
                    subNav: null
                }
            ]
        }
    },
}
</script>
<script setup>
const resources = [
    {
        name: 'Help Center',
        description: 'Get all of your questions answered in our forums or contact support.',
        href: '#',
        icon: LifebuoyIcon,
    },
    {
        name: 'Guides',
        description: 'Learn how to maximize our platform to get the most out of it.',
        href: '#',
        icon: BookmarkSquareIcon,
    },
    {
        name: 'Events',
        description: 'See what meet-ups and other events we might be planning near you.',
        href: '#',
        icon: CalendarIcon,
    },
    { name: 'Security', description: 'Understand how we take your privacy seriously.', href: '#', icon: ShieldCheckIcon },
]
const recentPosts = [
    { id: 1, name: 'Boost your conversion rate', href: '#' },
    { id: 2, name: 'How to use search engine optimization to drive traffic to your site', href: '#' },
    { id: 3, name: 'Improve your customer experience', href: '#' },
]
</script>
