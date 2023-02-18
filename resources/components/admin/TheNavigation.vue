<template>
    <div class="flex flex-1 justify-end px-4 shadow-b">
        <div class="ml-4 flex items-center gap-x-2 md:ml-6">
            <button
                type="button"
                class="rounded-full bg-white p-1 dark:text-red-600 hover:dark:text-red-800 text-sky-600 hover:text-sky-700 animate-wiggle focus:outline-none focus:ring-2 focus:dark:ring-red-600 focus:ring-sky-600 focus:ring-offset-2"
            >
                <span class="sr-only">Thông báo</span>
                <BellIcon class="h-6 w-6" aria-hidden="true" />
            </button>
            <button
                type="button"
                class="rounded-full p-1 bg-black text-white dark:bg-white dark:text-yellow-500" @click="toggleDark()"
            >
                <span class="sr-only">Thông báo</span>
                <SunIcon class="h-6 w-6 hover:animate-spin " aria-hidden="true" v-if="isDark"/>
                <MoonIcon class="h-6 w-6 hover:animate-wiggle" aria-hidden="true" v-else/>
            </button>
            <!-- Profile dropdown -->
            <Menu as="div" class="relative ml-3">
                <div>
                    <MenuButton
                        class="flex max-w-xs items-center rounded-full bg-zinc-900 text-sm focus:outline-none focus:ring-2 focus:dark:ring-red-600  focus:ring-sky-600 focus:ring-offset-2"
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
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md dark:bg-zinc-900 bg-white pb-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:shadow-none"
                    >
                        <div class="px-4 py-2 text-white dark:bg-red-600 bg-sky-600 text-lg rounded-t-md">Xin chào <span class=""> {{this.getData.name}}</span>!</div>
                        <MenuItem v-for="item in list"  v-slot="{ active }">
                            <a @click="submit(item.method)"
                            :class="[active ? 'dark:bg-red-900 bg-sky-700 ' : '', 'block px-4 py-2 text-sm dark:text-white text-black hover:text-white']">{{ item.name }}</a>
                        </MenuItem>
                    </MenuItems>
                </transition>
            </Menu>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {

    data() {
        return {
            list: [
                { name: "Your Profile", method: "#" },
                { name: "Settings", method: "#" },
                { name: "Đăng Xuất", method: "logout" },
            ],
            config: {
                headers: { Authorization: `Bearer ${this.$cookies.get('ltoken')}`}
            }
        };
    },
    methods:{
        async submit(method){
            await axios.post(`/api/${method}`,{}, this.config).then( (response) => {
                console.log(response)
                this.$router.push({ name: 'login' })
            })

        }
    },
    computed:{
        getData(){
            const data =  this.$cookies.get('info_user')
            return data;
        }
    }
};
</script>
<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import { BellIcon ,SunIcon} from "@heroicons/vue/24/outline";
import { MoonIcon} from "@heroicons/vue/24/solid";
import { useDark, useToggle } from '@vueuse/core';

const isDark = useDark();
const toggleDark =  useToggle(isDark)
</script>
