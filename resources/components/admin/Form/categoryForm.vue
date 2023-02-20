<template>
    <div class="sm:overflow-hidden sm:rounded-md">
        <form @submit.prevent="submitForm" enctype='multipart/form-data'>
            <div class="space-y-4 bg-white py-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên Thể Loại</label>
                    <div class="mt-1 flex rounded-lg">
                      <span class="inline-flex items-center rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">
                          <QueueListIcon class="w-4 h-5"/>
                      </span>
                      <input type="text" id="name" placeholder="Nhập tên thể loại..." v-model="form.name"
                      class="block w-full flex-1 rounded-none rounded-r-lg border-gray-300 focus:ring-sky-600 focus:ring-0 sm:text-sm"/>
                    </div>
                </div>
                <div>
                    <label for="desc" class="block text-sm font-medium text-gray-700">Thông Tin</label>
                    <div class="mt-1 rounded-lg">
                      <textarea id="desc" placeholder="Nhập thông tin thể loại..." v-model="form.desc" rows="4"
                      class="block w-full flex-1 rounded-lg border-gray-300 focus:ring-sky-600 focus:ring-0 sm:text-sm resize-none"/>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Hình Ảnh</label>
                    <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6 relative">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-sky-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-sky-500 focus-within:ring-offset-2 hover:text-sky-500">
                                <span>Tải ảnh lên</span>
                                <input id="file-upload" name="file-upload" accept="image/png, image/jpeg, image/gif, image/jpg"
                                type="file" @change="onFileChange" class="sr-only" />
                            </label>
                            <p class="pl-1">hoặc kéo thả ảnh vào</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF tối đa 10MB</p>
                        </div>
                        <div class="absolute inset-0 bg-white" :class="{'hidden':!url}">
                            <img v-if="url" :src="url" class="w-full h-full object-cover rounded-md mx-auto"/>
                        </div>
                        <button @click="this.url = null,this.image = null" type="button"
                        class="absolute z-10 top-1 right-2 bg-gray-100 opacity-70 font-medium px-1 rounded hover:opacity-100 duration-500" :class="{'hidden':!url}">
                            Xóa
                        </button>
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
import { QueueListIcon } from "@heroicons/vue/24/outline";
import { mapActions, mapMutations ,mapGetters} from "vuex";

    export default {
        components:{QueueListIcon},
        data(){
            return{
                form:{
                    name:'',
                    desc:'',
                    image:null
                },
                url:null,
            }
        },
        methods: {
            onFileChange(e) {
                const file = e.target.files[0];
                this.form.image = file;
                this.url = URL.createObjectURL(file);
            },
            submitForm(){
                let payload = new FormData();
                payload.append('name',this.form.name)
                payload.append('desc',this.form.desc)
                payload.append('image',this.form.image)
                this.isUpdate ? this.putData(this.form) : this.postData(payload)
                this.CLOSE_MODAL()
            },
            ...mapActions(['postData','putData']),
            ...mapMutations(['CLOSE_MODAL'])
        },
        mounted() {
            this.isUpdate ? this.form = this.getUpdateData : this.form={name:'',desc:'',image:null};
        },
        computed:{
            ...mapGetters(['getUpdateData','isUpdate']),
        }
    }
</script>
