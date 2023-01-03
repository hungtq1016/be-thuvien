<template>
  <div class="mx-auto px-4 sm:px-6 md:px-8 bg-zinc-700 rounded-lg text-white py-2">
    <div class="flex justify-end gap-x-2">
      <router-link to="/admin/users/add"
        class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto">Thêm
        Phim</router-link>
    </div>
  </div>
  <div class="mx-auto px-4 sm:px-6 md:px-8 bg-zinc-700 rounded-lg text-white">
    <div class="py-4 sm:py-6 md:py-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden">
            <table class="min-w-full">
              <thead class="text-white">
                <tr class="uppercase border-b-2 border-white">
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold  sm:pl-6">Name</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold ">Title</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold ">Email</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold ">Role</th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="">
                <tr v-for="(item, id) in tableList" :key="item.email"
                  :class="id % 2 === 0 ? 'bg-zinc-900 hover:bg-red-600' : 'hover:bg-red-400'"
                  class="hover:bg-red-600 group">
                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium  sm:pl-6">{{ item.name }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm ">{{ item.title }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm ">{{ item.email }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm ">{{ item.role }}</td>
                  <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                    <a href="#" class="text-red-600 hover:text-red-500 group-hover:text-white">Edit<span
                        class="sr-only">, {{ item.name }}</span></a> /
                    <a href="#" class="text-red-600 hover:text-red-500 group-hover:text-white">Delete
                      <span class="sr-only">, {{ item.name }}</span></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import {
  SunIcon,
} from "@heroicons/vue/24/outline";
export default {
  data() {
    return {
      tableList: [
        { name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member' },
        { name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member' },
        { name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member' },
        { name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member' },
        { name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member' },

      ]
    }
  }
}
</script>
