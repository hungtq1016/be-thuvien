<template>
    <div class=" mx-auto px-4 sm:px-6 md:px-8 dark:bg-zinc-700 rounded-lg dark:first-letter:text-white bg-white text-black py-2 " >
      <ModalComponent :key="$route.fullPath" :resource="this.$route.path.split('/').slice(-1)[0]"/>
    </div>
    <TableComponent :key="$route.fullPath"/>
  </template>

  <script>
  import ModalComponent from "../../components/admin/ModalComponent.vue";
import TableComponent from "../../components/admin/TableComponent.vue";

  export default {
    components: {
    TableComponent,
    ModalComponent
}
  };
  </script>
