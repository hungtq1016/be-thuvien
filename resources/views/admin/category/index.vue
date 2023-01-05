<template>
  <div
    class="mx-auto px-4 sm:px-6 md:px-8 dark:bg-zinc-700 rounded-lg dark:first-letter:text-white bg-white text-black py-2">
    <div class="flex justify-end gap-x-2">
      <button @click="isOpen = !isOpen; this.query = null"
        class="inline-flex items-center justify-center rounded-md border border-transparent dark:bg-red-600 bg-sky-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:dark:bg-red-500 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:dark:ring-red-500 focus:ring-offset-2 sm:w-auto">Thêm
        Thể Loại</button>
    </div>
  </div>
  <div class="mx-auto px-4 sm:px-6 md:px-8 dark:bg-zinc-700 rounded-lg dark:text-white bg-white text-black">
    <div class="py-4 sm:py-6 md:py-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden">
            <TableForm :data="this.list" :labels="this.labels" @openModal="isOpen = !isOpen" @update="updateData()"
              @query="(value) => this.query = value" />
          </div>
          <pagination v-model="page" :records="this.total" :per-page="per_page" @paginate="updatePage" />

        </div>
      </div>
    </div>
  </div>
  <TransitionRoot :show="isOpen" as="template">
    <Dialog as="div" class="relative z-10">
      <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
        leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-black bg-opacity-25" />
      </TransitionChild>
      <Modal @closeModal="isOpen = !isOpen;updateData()"  :query="query" />
    </Dialog>
  </TransitionRoot>
</template>

<script>
import TableForm from '../../../components/admin/Table.vue';
import Modal from '../../../components/admin/Modal.vue';

import axios from 'axios';
import Pagination from 'v-pagination-3';

export default {
  components: {
    TableForm, Pagination, Modal
  },
  data() {
    return {
      query: "",
      isOpen: false,
      total: 0,
      per_page: 0,
      page: 1,
      list: [],
      labels: [
        { name: "Tên Thể Loại", field: "name" },
      ],
      config: {
        headers: { Authorization: `Bearer ${localStorage.getItem('token-admin')}` }
      }
    }
  },
  async mounted() {
    await axios
      .get(`http://127.0.0.1:8001/api/category?page=${this.page}`, this.config)
      .then(response => (this.list = response.data.data, this.total = response.data.meta.total, this.per_page = response.data.meta.per_page))
  },
  methods: {
    async updateData(){
      await axios.get(`http://127.0.0.1:8001/api/category?page=${this.page}`, this.config).then(response => (this.list = response.data.data));
    },
    async updatePage(value) {
      await axios.get(`http://127.0.0.1:8001/api/category?page=${value}`, this.config).then(response => (this.list = response.data.data));
    }
  }
}
</script>
<script setup>
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'

</script>