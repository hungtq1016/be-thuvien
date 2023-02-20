<template>
    <div class="sm:overflow-hidden sm:rounded-md">
        <form @submit.prevent="submitForm" enctype='multipart/form-data'>
            <div class="space-y-4 bg-white py-4">
                <div>
                    <div class="flex gap-x-2 py-2">
                        <div v-for="item in categories" :key="item"
                         class="rounded-lg bg-sky-200 border border-sky-600 py-1 px-2 flex items-center gap-x-3 group">
                            <span>{{item}}</span>
                            <button class="hidden group-hover:inline"><XMarkIcon class="w-3 h-3 text-red-600"/></button>
                        </div>
                    </div>
                    <label for="permission" class="block text-sm font-medium text-gray-700 py-2">Quyền Hạn</label>
                    <div class="mt-1 rounded-lg flex" >
                        <input type="text" list="permission" class="flex-1 ml-1 rounded-l-lg border-r-none border-gray-300 focus:ring-0 focus:outline-none focus:border-sky-600" v-model="category" />
                        <button class="border border-gray-300 bg-gray-100 rounded-r-lg border-l-none px-3 hover:bg-gray-200" type="button" @click="add"><PlusIcon class="w-4 h-4" /></button>
                        <datalist id="permission">
                            <option value="Internet Explorer"/>
                            <option value="Firefox"/>
                            <option value="Chrome"/>
                            <option value="Opera"/>
                            <option value="Safari"/>
                        </datalist>
                    </div>
                </div>
            </div>
            <div class="text-right">
              <button type="submit"
              class="inline-flex justify-center rounded-md border border-transparent bg-sky-600 py-2 px-4 text-sm font-medium text-white shadow-sm
              hover:bg-sky-600 focus:outline-none focus:ring-0 focus:ring-sky-600 focus:ring-offset-2">Xác Nhận</button>
            </div>

        </form>
      </div>
</template>

<script>
import { TableCellsIcon ,XMarkIcon,PlusIcon} from "@heroicons/vue/24/outline";
import { mapActions, mapMutations ,mapGetters} from "vuex";
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'

    export default {
        components:{TableCellsIcon,CheckIcon, ChevronUpDownIcon,XMarkIcon ,PlusIcon},
        data(){
            return{
                data:[],
                categories:[],
                category:''
            }
        },
        methods: {
            add(){
                this.categories.indexOf(this.category) === -1 ?
                this.categories.push(this.category) : console.log('is exist')
            },
            submitForm(){
                let payload = new FormData();
                payload.append('name',this.form.name)
                this.isUpdate ? this.putData(this.form) : this.postData(payload)
                this.CLOSE_MODAL()
            },
            ...mapActions(['postData','putData']),
            ...mapMutations(['CLOSE_MODAL'])
        },
        mounted() {
            this.isUpdate ? this.form = this.getUpdateData : this.form={name:''};
        },
        computed:{
            ...mapGetters(['getUpdateData','isUpdate']),
        }
    }
</script>
