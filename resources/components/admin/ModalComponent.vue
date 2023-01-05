<template>
  <TransitionRoot appear :show="isModal" as="template">
    <Dialog as="div" class="relative z-10">
      <TransitionChild
        as="template"
        enter="duration-300 ease-out"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="duration-200 ease-in"
        leave-from="opacity-100"
        leave-to="opacity-0"
      >
        <div class="fixed inset-0 bg-black bg-opacity-25" />
      </TransitionChild>

      <div class="fixed inset-0 overflow-y-auto">
        <div
          class="flex min-h-full items-center justify-center p-4 text-center"
        >
          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95"
          >
            <DialogPanel
              class="
                w-full
                max-w-md
                transform
                overflow-hidden
                rounded-2xl
                bg-white
                p-6
                text-left
                align-middle
                shadow-xl
                transition-all
              "
            >
              <DialogTitle
                as="h3"
                class="text-lg font-medium leading-6 text-gray-900"
              >
                Edit
              </DialogTitle>
              <div class="mt-2">
                <KeepAlive>
                  <component :is="current" :idProp="this.idProp"/>
                </KeepAlive>
              </div>

              <div class="mt-4">
                <button
                  type="button"
                  class=""
                  @click="(isModal = !isModal), $emit('closeModal')"
                >
                  Trở Về
                </button>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
  <script>
import TagForm from "../../views/admin/tag/TagForm.vue";
import CategoryForm from "../../views/admin/category/FormCategory.vue";

export default {
  components: { TagForm ,CategoryForm},
  props: ["openModal","idProp"],
  data() {
    return {
      isModal: false,
      current: "TagForm",
    }
  },
  watch: {
    openModal: function (newVal, oldVal) {
      // watch it
      this.isModal = newVal;
    },
  },
};
</script>
  <script setup>
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from "@headlessui/vue";
</script>
