<template>
    <div class="flex flex-1 justify-end px-4">
        <div class="ml-4 flex items-center md:ml-6">
            <button
                type="button"
                class="rounded-full bg-white p-1 text-red-600 hover:text-red-800 animate-wiggle focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2"
            >
                <span class="sr-only">Thông báo</span>
                <BellIcon class="h-6 w-6" aria-hidden="true" />
            </button>

            <!-- Profile dropdown -->
            <Menu as="div" class="relative ml-3">
                <div>
                    <MenuButton
                        class="flex max-w-xs items-center rounded-full bg-zinc-900 text-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2"
                    >
                        <span class="sr-only">Open  menu</span>
                        <img
                            class="h-8 w-8 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                        />
                    </MenuButton>
                </div>
                <transition
                    enter-active-class="transition ease-out duration-100"
                    enter-from-class="transform opacity-0 scale-95"
                    enter-to-class="transform opacity-100 scale-100"
                    leave-active-class="transition ease-in duration-75"
                    leave-from-class="transform opacity-100 scale-100"
                    leave-to-class="transform opacity-0 scale-95"
                >
                    <MenuItems
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-zinc-900 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    >
                        <div class="px-4 py-2 text-white bg-red-600 text-lg rounded-t-md">Hello <span class=""> Admin</span>!</div>
                        <MenuItem v-for="item in list" :key="item.name" v-slot="{ active }">
                        <a :href="item.href" :class="[active ? 'bg-red-900' : '', 'block px-4 py-2 text-sm text-white']">{{ item.name }}</a>
                    </MenuItem>
                    </MenuItems>
                </transition>
            </Menu>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            list: [
                { name: "Your Profile", href: "#" },
                { name: "Settings", href: "#" },
                { name: "Sign out", href: "#" },
            ],
        };
    },
};
</script>
<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import { BellIcon } from "@heroicons/vue/24/outline";
</script>
