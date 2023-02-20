<template>
    <div class="sm:overflow-hidden sm:rounded-md">
        <form @submit.prevent="submitForm">
            <div class="space-y-4 bg-white py-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên Tác Giả</label>
                    <div class="mt-1 flex rounded-lg">
                      <span class="inline-flex items-center rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">
                          <UserIcon class="w-4 h-5"/>
                      </span>
                      <input type="text" id="name" placeholder="Nhập tên tác giả..." v-model="form.name"
                      class="block w-full flex-1 rounded-none rounded-r-lg border-gray-300 focus:ring-sky-600 focus:ring-0 sm:text-sm"/>
                    </div>
                </div>
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700">Quốc Gia</label>
                    <div class="mt-1 flex rounded-lg">
                      <span class="inline-flex items-center rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">
                          <GlobeAsiaAustraliaIcon class="w-4 h-5"/>
                      </span>
                      <input type="text" id="country" placeholder="Nhập quốc gia..." v-model="form.country"
                      class="block w-full flex-1 rounded-none rounded-r-lg border-gray-300 focus:ring-sky-600 focus:ring-0 sm:text-sm"/>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                    <div>
                        <label for="yob" class="block text-sm font-medium text-gray-700">Ngày Sinh</label>
                        <div class="mt-1 flex rounded-lg">
                          <span class="inline-flex items-center rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">
                              <ClockIcon class="w-4 h-5"/>
                          </span>
                          <!-- <Datepicker v-model="form.yob" inputFormat="dd-MM-yyyy"
                          class="flex-1 rounded-none rounded-r-lg border-gray-300 focus:ring-sky-600 focus:ring-0 sm:text-sm" id="yob"/> -->
                          <input type="date" v-model="form.yob"
                          class="w-full rounded-r-lg border-gray-300">
                        </div>
                    </div>
                    <div :class="{'hidden':!isDeath}">
                        <label for="yod" class="block text-sm font-medium text-gray-700">Ngày Mất</label>
                        <div class="mt-1 flex rounded-lg">
                          <span class="inline-flex items-center rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">
                              <ClockIcon class="w-4 h-5"/>
                          </span>
                          <!-- <Datepicker v-model="form.yod" inputFormat="dd-MM-yyyy"
                          class=" flex-1 rounded-none rounded-r-lg border-gray-300 focus:ring-sky-600 focus:ring-0 sm:text-sm" id="yod"/> -->
                          <input type="date" v-model="form.yod" :max="this.currentDate"
                          class="w-full rounded-r-lg border-gray-300">
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-x-3 px-1">
                    <input type="checkbox" class="rounded-md ring-sky-600 checked:bg-sky-600 checked:ring-0 checked:outline-none hover:bg-sky-600 checked:hover:bg-sky-400"
                    id="is-death" v-model="isDeath" @click="isDeathToggle"><label for="is-death" class="font-medium text-gray-700">Đã mất</label>
                </div>

                <div>
                    <label for="about" class="block text-sm font-medium text-gray-700">Giới Tính</label>
                    <div class="grid grid-cols-3 gap-x-4 mt-1">
                        <label for="male">
                            <input class="peer hidden" type="radio" id="male" value="male" v-model="form.gender">
                            <div class="border border-gray-300 rounded-lg py-3 peer-checked:border-sky-600 peer-checked:text-sky-600 font-medium text-gray-400 pl-3 hover:border-sky-600 hover:text-sky-600">
                                Nam
                            </div>
                        </label>
                        <label for="female">
                            <input class="peer hidden" type="radio" id="female" value="female" v-model="form.gender">
                            <div class="border border-gray-300 rounded-lg py-3 peer-checked:border-sky-600 peer-checked:text-sky-600 font-medium text-gray-400 pl-3 hover:border-sky-600 hover:text-sky-600">
                                Nữ
                            </div>
                        </label>
                        <label for="other">
                            <input class="peer hidden" type="radio" id="other" value="other" v-model="form.gender">
                            <div class="border border-gray-300 rounded-lg py-3 peer-checked:border-sky-600 peer-checked:text-sky-600 font-medium text-gray-400 pl-3 hover:border-sky-600 hover:text-sky-600">
                                Khác
                            </div>
                        </label>
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
                        <button @click="this.url = null,this.image = null"
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
import { UserIcon, GlobeAsiaAustraliaIcon,ClockIcon } from "@heroicons/vue/24/outline";
import { mapActions, mapMutations ,mapGetters} from "vuex";

    export default {
        components:{UserIcon,GlobeAsiaAustraliaIcon,ClockIcon},
        data(){
            return{
                isDeath:false,
                form:{
                    name:'',
                    country:'',
                    yob: null,
                    yod: null,
                    gender: 'male',
                    image:null
                },
                url:null,
            }
        },
        methods: {
            isDeathToggle(){
                this.isDeath = !this.isDeath;
                this.form.yod = (this.form.yod == null) ? this.currentDate : null
            },
            onFileChange(e) {
                const file = e.target.files[0];
                this.form.image = file;
                this.url = URL.createObjectURL(file);
            },
            submitForm(){
                let payload = new FormData();
                payload.append('name',this.form.name)
                payload.append('country',this.form.country)
                payload.append('yob',this.form.yob)
                payload.append('yod',this.form.yod)
                payload.append('gender',this.form.gender)
                payload.append('image',this.form.image)
                this.isUpdate ? this.putData(payload) : this.postData(payload)
                this.CLOSE_MODAL()
            },
            ...mapActions(['postData','putData']),
            ...mapMutations(['CLOSE_MODAL'])
        },
        mounted() {
            this.isUpdate ? this.form = this.getUpdateData : this.form={name:'',country:'',yob: null, yod: null, gender: 'male',image:null};
            this.isUpdate ? '' : this.form.yob = this.currentDate
        },
        computed:{
            ...mapGetters(['getUpdateData','isUpdate']),
            currentDate(){
                const currentDate = new Date();
                let month = currentDate.getMonth()+1;
                month = month < 10 ? '0'+month :month
                return  currentDate.getFullYear() + '-' + month + '-' + currentDate.getDate()
            }
        }
    }
</script>
