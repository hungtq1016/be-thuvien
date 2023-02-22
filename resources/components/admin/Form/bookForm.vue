<template>
    <div class="sm:overflow-hidden sm:rounded-md">
        <form @submit.prevent="submitForm" enctype='multipart/form-data'>
            <div class="space-y-4 bg-white py-4">
                <SelectInput title="Thể Loại" resource="category"/>
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
import { mapActions, mapMutations ,mapGetters} from "vuex";
import { ChevronUpDownIcon } from '@heroicons/vue/20/solid';
import SelectInput from '../Input/SelectInputComponent.vue'

    export default {
        components:{SelectInput},
        data(){
            return{
                dataCategories:[1,2,3,4,5,6,7,8,9],
                categories:[],
                category:'',
            }
        },
        methods: {
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
