<template>
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog
                as="div"
                class="relative z-40 md:hidden"
                @close="sidebarOpen = false"
            >
                <TransitionChild
                    as="template"
                    enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" />
                </TransitionChild>

                <div class="fixed inset-0 z-40 flex">
                    <TransitionChild
                        as="template"
                        enter="transition ease-in-out duration-300 transform"
                        enter-from="-translate-x-full"
                        enter-to="translate-x-0"
                        leave="transition ease-in-out duration-300 transform"
                        leave-from="translate-x-0"
                        leave-to="-translate-x-full"
                    >
                        <DialogPanel
                            class="relative flex w-full max-w-xs flex-1 flex-col dark:bg-zinc-900 bg-white pt-5 pb-4"
                        >
                            <TransitionChild
                                as="template"
                                enter="ease-in-out duration-300"
                                enter-from="opacity-0"
                                enter-to="opacity-100"
                                leave="ease-in-out duration-300"
                                leave-from="opacity-100"
                                leave-to="opacity-0"
                            >
                                <div class="absolute top-0 right-0 -mr-12 pt-2">
                                    <button
                                        type="button"
                                        class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:dark:ring-red-800 focus:ring-black"
                                        @click="sidebarOpen = false"
                                    >
                                        <span class="sr-only"
                                            >Close sidebar</span
                                        >
                                        <XMarkIcon
                                            class="h-6 w-6 dark:text-red-800 text-black"
                                            aria-hidden="true"
                                        />
                                    </button>
                                </div>
                            </TransitionChild>
                            <div class="flex flex-shrink-0 items-center px-4">
                                <img
                                    class="h-8 w-auto"
                                    src="https://tailwindui.com/img/logos/mark.svg?color=blue&shade=600"
                                    alt="Your Company"
                                />
                            </div>
                            <div class="mt-5 h-0 flex-1 overflow-y-auto">
                                <nav class="space-y-1 px-2">
                                    <TheNavigationItem />
                                </nav>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                    <div class="w-14 flex-shrink-0" aria-hidden="true">
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
        <TheAside />
        <div class="flex flex-col md:pl-64 dark:bg-black bg-gray-200 min-h-[100vh]">
            <div
                class="sticky top-0 z-10 flex h-16 flex-shrink-0 dark:bg-zinc-900 bg-white"
            >
                <button
                    type="button"
                    class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:dark:ring-red-600 focus:ring-sky-600 md:hidden"
                    @click="sidebarOpen = true"
                >
                    <span class="sr-only">Open sidebar</span>
                    <Bars3BottomLeftIcon class="h-6 w-6" aria-hidden="true" />
                </button>
                <TheNavigation />
            </div>
            <main class="flex-1 ">
                <div class="p-6 space-y-4">
                    <TitleComponent :title="this.$route.meta"/>
                    <router-view></router-view>

                </div>
            </main>
        </div>
</template>
<script>
import TheAside from "../../components/admin/TheAside.vue";
import TheNavigationItem from "../../components/admin/TheNavigationItem.vue";
import TheNavigation from "../../components/admin/TheNavigation.vue";
import TitleComponent from '../../components/admin/TitleComponent.vue';

import { ref } from "vue";
import {
    Bars3BottomLeftIcon,
    BellIcon,
    XMarkIcon,
} from "@heroicons/vue/24/outline";
import {
    Dialog,
    DialogPanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
export default {
    components: {
        TheAside,
        TheNavigationItem,
        TheNavigation,TitleComponent
    }
};
</script>

<script setup>
const sidebarOpen = ref(false);
</script>
