<template>
    <div class="fixed inset-0 overflow-y-auto">
        <div
          class="flex min-h-full items-center justify-center p-1 md:p-4 text-center"
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
              class="w-full max-w-2xl transform overflow-hidden rounded-2xl bg-white dark:bg-zinc-600 p-6 text-left align-middle shadow-xl transition-all"
            >
              <DialogTitle
                as="h3"
                class="text-lg font-medium leading-6 text-slate-900 dark:text-white"
              >
                Thêm Thể Loại
              </DialogTitle>
              <div class="mt-2">
                <FormCategory @closeModal="$emit('closeModal')" :id="this.query"/>
              </div>

              <div class="absolute top-6 right-6">
                <button
                  type="button"
                  class=""
                  @click="$emit('closeModal')"
                >
                  <XMarkIcon class="w-6 h-6 dark:text-white"/>
                </button>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
</template>
<script>
import FormCategory from '../../views/admin/category/FormCategory.vue'
    export default {
      props:['query'],
      components:{
        FormCategory
      },
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
import {
    XMarkIcon,
} from "@heroicons/vue/24/outline";
</script>

<style lang="scss" scoped>

</style>