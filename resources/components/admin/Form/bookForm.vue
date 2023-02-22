<template>
    <div class="sm:overflow-hidden sm:rounded-md">
        <form @submit.prevent="submitForm" enctype="multipart/form-data">
            <div class="space-y-4 bg-white py-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700" >Tên Sách</label >
                    <div class="mt-1 flex rounded-lg">
                        <span class="inline-flex items-center rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500" >
                            <BookOpenIcon class="w-4 h-5" />
                        </span>
                        <input type="text" id="name" placeholder="Nhập tên sách..." v-model="form.name" class="block w-full flex-1 rounded-none rounded-r-lg border-gray-300 focus:ring-sky-600 focus:ring-0 sm:text-sm" />
                    </div>
                </div>
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700" >Quốc Gia</label >
                    <div class="mt-1 flex rounded-lg">
                        <span class="inline-flex items-center rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500" >
                            <GlobeAsiaAustraliaIcon class="w-4 h-5" />
                        </span>
                        <input type="text" id="country" placeholder="Nhập quốc gia..." v-model="form.country" class="block w-full flex-1 rounded-none rounded-r-lg border-gray-300 focus:ring-sky-600 focus:ring-0 sm:text-sm" />
                    </div>
                </div>
                <div>
                    <label for="release" class="block text-sm font-medium text-gray-700" >Ngày Phát Hành</label >
                    <div class="mt-1 flex rounded-lg">
                        <span class="inline-flex items-center rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500" >
                            <ClockIcon class="w-4 h-5" />
                        </span>
                        <input type="date" v-model="form.release" class="w-full rounded-r-lg border-gray-300" />
                    </div>
                </div>
                <div>
                    <label for="desc" class="block text-sm font-medium text-gray-700" >Thông Tin</label >
                    <div class="mt-1 rounded-lg">
                        <textarea id="desc" placeholder="Nhập thông tin sách..." v-model="form.desc" rows="4" class="block w-full flex-1 rounded-lg border-gray-300 focus:ring-sky-600 focus:ring-0 sm:text-sm resize-none"></textarea>
                    </div>
                </div>
                <SelectInput title="Thể Loại" resource="category" @dataChange="val=>{this.form.categories = val}"/>
                <SelectInput title="Nhãn" resource="tag" @dataChange="val=>{this.form.tags = val}"/>
                <SelectInput title="Tác Giả" resource="author" @dataChange="val=>{this.form.authors = val}"/>
                <SelectOnly title="Kệ Sách" resource="bookshelf" @dataChange="val=>{this.form.bookshelf_id = val}"/>
                <SelectOnly title="Ngành Học" resource="major" @dataChange="val=>{this.form.major_id = val}"/>
                <SelectOnly title="Nhà Xuất Bản" resource="publisher" @dataChange="val=>{this.form.publisher_id = val}"/>
                <SelectOnly title="Ngôn Ngữ" resource="language" @dataChange="val=>{this.form.language_id = val}"/>
                <SelectOnly title="Series" resource="book" @dataChange="val=>{this.form.series_id = val}"/>

                <div>
                    <label class="block text-sm font-medium text-gray-700" >Hình Ảnh</label >
                    <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6 relative" >
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true" > <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-sky-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-sky-500 focus-within:ring-offset-2 hover:text-sky-500" >
                                    <span>Tải ảnh lên</span>
                                    <input id="file-upload" name="file-upload" accept="image/png, image/jpeg, image/gif, image/jpg" type="file" @change="onFileChange" class="sr-only" />
                                </label>
                                <p class="pl-1">hoặc kéo thả ảnh vào</p>
                            </div>
                            <p class="text-xs text-gray-500"> PNG, JPG, GIF tối đa 10MB </p>
                        </div>
                        <div class="absolute inset-0 bg-white" :class="{ hidden: !url }" >
                            <img v-if="url" :src="url" class="w-full h-full object-cover rounded-md mx-auto" />
                        </div>
                        <button type="button" @click="(this.url = null), (this.image = null)" class="absolute z-10 top-1 right-2 bg-gray-100 opacity-70 font-medium px-1 rounded hover:opacity-100 duration-500" :class="{ hidden: !url }" >
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
            <button @click="test" type="button">ads</button>
            <div class="text-right">
                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-sky-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-sky-600 focus:outline-none focus:ring-0 focus:ring-sky-600 focus:ring-offset-2" >
                    Xác Nhận
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { mapActions, mapMutations, mapGetters } from "vuex";
import { BookOpenIcon,GlobeAsiaAustraliaIcon,ClockIcon } from "@heroicons/vue/24/outline";
import SelectInput from "../Input/SelectInputComponent.vue";
import SelectOnly from "../Input/SelectOnlyComponennt.vue";

export default {
    components: { SelectInput, BookOpenIcon, GlobeAsiaAustraliaIcon, ClockIcon, SelectOnly },
    data() {
        return {
            form:{
                name:null,
                country:null,
                desc:null,
                release:'10-16-2000',
                categories:[],
                tags:[],
                authors:[],
                bookshelf_id:null,
                publisher_id:null,
                major_id:null,
                language_id:null,
                series_id:null,
                image:null
            },
            url:null
        };
    },
    methods: {
        submitForm() {
            let payload = new FormData();
            payload.append("name", this.form.name);
            payload.append('country',this.form.country);
            payload.append('desc',this.form.desc);
            payload.append('release',this.form.release);
            payload.append('categories',this.form.categories);
            payload.append('tags',this.form.tags);
            payload.append("authors", this.form.authors);
            payload.append('bookshelf_id',this.form.bookshelf_id);
            payload.append('publisher_id',this.form.publisher_id);
            payload.append('major_id',this.form.major_id);
            payload.append('language_id',this.form.language_id);
            payload.append('series_id',this.form.series_id);
            payload.append('image',this.form.image);
            this.isUpdate ? this.putData(this.form) : this.postData(payload);
            this.CLOSE_MODAL();
        },
        onFileChange(e) {
                const file = e.target.files[0];
                this.form.image = file;
                this.url = URL.createObjectURL(file);
            },
        ...mapActions(["postData", "putData"]),
        ...mapMutations(["CLOSE_MODAL"]),
        test(){
            console.log(this.form);
        }
    },
    mounted() {
        // this.isUpdate ? (this.form = this.getUpdateData) : (this.form = { name: "" });
        this.isUpdate ? '' : this.form.release = this.currentDate
    },
    computed: {
        ...mapGetters(["getUpdateData", "isUpdate"]),
        currentDate(){
                const currentDate = new Date();
                let month = currentDate.getMonth()+1;
                month = month < 10 ? '0'+month :month
                return  currentDate.getFullYear() + '-' + month + '-' + currentDate.getDate()
        }
    },
};
</script>
