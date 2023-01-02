<template>
 <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex min-h-0 flex-1 flex-col bg-gray-800">
        <div class="flex h-16 flex-shrink-0 items-center bg-gray-900 px-4">
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=red&shade=500" alt="Your Company" />
        </div>
        <div class="flex flex-1 flex-col overflow-y-auto">
          <nav class="flex-1 space-y-1 px-2 py-4">
            <router-link v-for="item in navigation" :key="item.name" :to="item.href" class="text-gray-200 hover:bg-gray-700 hover:text-red-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
              <component :is="item.icon" :class="[item.current ? 'text-gray-300' : 'text-gray-400 group-hover:text-red-800', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
              {{ item.name }}
            </router-link>
          </nav>
        </div>
      </div>
    </div>
</template>

<script setup>

import { ref } from 'vue'
import {
  Dialog,
  DialogPanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'
import {
  Bars3BottomLeftIcon,
  BellIcon,
  CalendarIcon,
  ChartBarIcon,
  FolderIcon,
  HomeIcon,
  InboxIcon,
  UsersIcon,
  XMarkIcon,
} from '@heroicons/vue/24/outline'
import { MagnifyingGlassIcon } from '@heroicons/vue/20/solid'

const navigation = [
  { name: 'Dashboard', href: '/admin', icon: HomeIcon, current: true },
  { name: 'Team', href: '/admin/movies', icon: FolderIcon, current: false },
  { name: 'Users', href: '/admin/users', icon: UsersIcon, current: false },
  { name: 'Calendar', href: '/admin/a', icon: CalendarIcon, current: false },
  { name: 'Documents', href: '/admin/v', icon: InboxIcon, current: false },
  { name: 'Reports', href: '/admin/c', icon: ChartBarIcon, current: false },
]
const userNavigation = [
  { name: 'Your Profile', href: '#' },
  { name: 'Settings', href: '#' },
  { name: 'Sign out', href: '#' },
]

const sidebarOpen = ref(false)
</script>

<style lang="scss" scoped>

</style>