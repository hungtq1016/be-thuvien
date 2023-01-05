<template>
  <TransitionRoot appear :show="isClose" as="template">
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
              w-full max-w-xl transform overflow-hidden rounded-2xl bg-white dark:bg-zinc-600 p-6 text-left align-middle shadow-xl transition-all
              "
            >
              <DialogTitle
                as="h3"
                class="text-lg font-medium leading-6 text-slate-900 dark:text-white"
              >
                {{idProp == null? "Thêm" : "Chỉnh Sửa" }} {{ this.$route.meta.title }}
              </DialogTitle>
              <div class="mt-2">
                <KeepAlive>
                  <component
                    :is="this.form"
                    :idProp="this.idProp"
                    :resource="resource"
                    @closeModal="
                      isClose = !false;
                      $emit('closeModal');
                    "
                    @closeAndUpdate="$emit('update'); $emit('closeModal');isClose = !false;"
                  />
                </KeepAlive>
              </div>
              <div class="absolute top-6 right-6">
                <button
                  type="button"
                  class=""
                  @click="(isClose = !isClose), $emit('closeModal')"
                >
                  <XMarkIcon class="w-6 h-6 dark:text-white"/>
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
import tagForm from "../../views/admin/tag/TagForm.vue";
import categoryForm from "../../views/admin/category/FormCategory.vue";
import {
    XMarkIcon,
} from "@heroicons/vue/24/outline";
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from "@headlessui/vue";
export default {
  components: {
    tagForm,
    categoryForm,
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
    XMarkIcon
  },
  props: ["openModal", "idProp","form","resource"],
  data() {
    return {
      isClose: false,
      current: "tagForm",
    };
  },
  watch: {
    openModal: function (newVal, oldVal) {
      // watch it
      this.isClose = newVal;
    },
  },
};
</script>
