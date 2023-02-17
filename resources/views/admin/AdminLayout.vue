<template>
    <div class=" mx-auto px-4 sm:px-6 md:px-8 dark:bg-zinc-700 rounded-lg dark:first-letter:text-white bg-white text-black py-2 " >
      <div class="flex justify-end gap-x-2">
        <button
        class="inline-flex items-center justify-center rounded-md border border-transparent dark:bg-red-600 bg-sky-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:dark:bg-red-500 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:dark:ring-red-500 focus:ring-offset-2 sm:w-auto">
        Thêm </button>
      </div>
    </div>
    <TableComponent :data="data"/>
    <!-- <ModalComponent :openModal="isOpen" @closeModal="this.isOpen = false" :idProp="id" :form="dataView+'Form'" :resource="dataView" @update="update"/> -->
  </template>

  <script>
//   import ModalComponent from "../../../components/admin/ModalComponent.vue";
  import TableComponent from "../../components/admin/TableComponent.vue";

  export default {
    components: {
    //   ModalComponent,
      TableComponent,
    },
    data() {
      return {
          data:{
            name:this.$route.path.split('/').slice(-1)[0],
            title: this.$route.meta.title
          }
      };
    },
  };
  </script>
