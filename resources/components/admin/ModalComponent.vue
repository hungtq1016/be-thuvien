<template>
    <div class="flex items-center justify-center">
      <button type="button" @click="openModal" class="rounded-md bg-black bg-opacity-20 px-4 py-2 text-sm font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75" >
        Thêm
      </button>
    </div>
    <TransitionRoot appear :show="isOpen" as="template">
      <Dialog as="div" @close="closeModal" class="relative z-10">
        <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100" leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0" >
          <div class="fixed inset-0 bg-black bg-opacity-25" />
        </TransitionChild>

        <div class="fixed inset-0 overflow-y-auto">
          <div class="flex min-h-full items-center justify-center p-4 text-center" >
            <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95" enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100" leave-to="opacity-0 scale-95" >
              <DialogPanel class="w-full max-w-xl transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all relative" >
                <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900" >
                  Thêm ...
                </DialogTitle>
                <KeepAlive>
                    <component :is="this.currentForm" @closeModal="closeModal"/>
                </KeepAlive>
                <div class="absolute top-6 right-6">
                  <button type="button" @click="closeModal"
                  class="p-1 border rounded-lg border-gray-400 text-gray-400 hover:border-sky-600 hover:text-sky-600 duration-700 hover:bg-sky-100">
                    <XMarkIcon class="w-5 h-5 "/>
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
    import { TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogTitle } from '@headlessui/vue'
    import { XMarkIcon } from "@heroicons/vue/24/outline";
    import authorForm from './Form/authorForm.vue';
    import bookForm from './Form/bookForm.vue';
    import bookshelfForm from './Form/bookshelfForm.vue';
    import categoryForm from './Form/categoryForm.vue';
    import languageForm from './Form/languageForm.vue';
    import tagForm from './Form/tagForm.vue';

    export default {
        components:{TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogTitle,XMarkIcon,
            authorForm, bookForm,bookshelfForm,categoryForm,languageForm,tagForm},
        props:['resource'],
        data(){
            return{
                isOpen:false,
                currentForm: this.resource+'Form'
            }
        },
        methods:{
            openModal(){
                this.isOpen = true
            },
            closeModal(){
                this.isOpen = false
            }
        }
    }
</script>
