<template>
  <div
    class="
      mx-auto
      px-4
      sm:px-6
      md:px-8
      dark:bg-zinc-700
      rounded-lg
      dark:first-letter:text-white
      bg-white
      text-black
      py-2
    "
  >
    <div class="flex justify-end gap-x-2">
      <button @click="this.isOpen = true;this.id = null"
      class="inline-flex items-center justify-center rounded-md border border-transparent dark:bg-red-600 bg-sky-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:dark:bg-red-500 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:dark:ring-red-500 focus:ring-offset-2 sm:w-auto">
      Thêm {{this.$route.meta.title}}</button>
    </div>
  </div>
  <TableComponent colName="tags" label="tag" :remove="removeData" @updateId="(val)=>{this.id = val}" @openModal="this.isOpen = true"/>
  <ModalComponent :openModal="isOpen" @closeModal="this.isOpen = false" :idProp="id" />
</template>

<script>
import ModalComponent from "../../../components/admin/ModalComponent.vue";
import TableComponent from "../../../components/admin/TableComponent.vue";

export default {
  components: {
    ModalComponent,
    TableComponent,
  },
  data() {
    return {
        id:null,
        isOpen: false,
        removeData: ["created_at", "updated_at","status"],
    };
  },
  methods:{

  }
};
</script>
