<template>
    <form enctype="multipart/form-data">
        <div class="space-y-3">
            <div>
                <label for="name" class="block text-sm font-medium dark:text-white">Tên</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name" v-model="form.name"
                        class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                        placeholder="Nhập Tên" aria-describedby="name-description" />
                </div>
            </div>
            <div>
                <label for="country" class="block text-sm font-medium dark:text-white">Quốc Gia</label>
                <div class="mt-1">
                    <input type="text" name="name" id="country" v-model="form.country"
                        class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                        placeholder="Nhập Quốc Gia" aria-describedby="country-description" />
                </div>
            </div>
            <div>
                <label for="gender" class="block text-sm font-medium dark:text-white">Giới Tính</label>
                <div class="mt-1">
                    <input type="text" name="name" id="gender" v-model="form.gender"
                        class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                        placeholder="Nhập Giới Tính" aria-describedby="gender-description" />
                </div>
            </div>
            <div>
                <label for="yob" class="block text-sm font-medium dark:text-white">Năm Sinh</label>
                <div class="mt-1">
                    <input type="text" name="name" id="yob" v-model="form.yob"
                        class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                        placeholder="Nhập Năm Sinh" aria-describedby="year-description" />
                </div>
            </div>
            <div>
                <label for="yod" class="block text-sm font-medium dark:text-white">Năm Mất</label>
                <div class="mt-1">
                    <input type="text" name="name" id="yod" v-model="form.yod"
                        class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                        placeholder="Nhập Năm Mất" aria-describedby="year-description" />
                </div>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium dark:text-white">Hình Đại Diện</label>
                <div class="mt-1">
                    <input type="file" name="name" id="image" accept="image/gif, image/jpeg, image/png"
                        class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                        placeholder="Nhập Giới Tính" v-on:change="onFileChange" />
                </div>
            </div>
            <img :src="this.url" alt="" class="w-24 h-24 mx-auto" :class="url == ''? 'hidden' :'block'" v-if="this.url.includes('http')">
            <img :src="`/public/images/`+this.url" alt="" class="w-24 h-24 mx-auto" :class="url == ''? 'hidden' :'block'" v-else>
            <div class="flex justify-between pt-2">
                <button type="button" @click="$emit('closeModal')"
                    class="inline-block px-6 py-2 border-2 dark:border-red-600 dark:text-red-600 border-sky-600 text-sky-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Trở
                    về</button>
                <button type="button" @click.prevent="submit();$emit('closeAndUpdate')"
                    class="inline-block px-6 py-2.5 dark:bg-red-600 bg-sky-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:dark:bg-red-700 hover:bg-sky-700 hover:shadow-lg focus:dark:bg-red-700 focus:bg-sky-600 focus:shadow-lg focus:outline-none focus:ring-0  active:shadow-lg transition duration-150 ease-in-out">Xác
                    Nhận</button>
            </div>
        </div>
    </form>
</template>

<script>
import moment from 'moment';
    export default {
        props:['idProp','resource'],
        data(){
            return{
                url:'',
                form:{
                    name: '',
                    gender: '',
                    yob: moment().format('DD/MM/YYYY'),
                    yod:'Null',
                    country: '',
                    image:''
                },
                config: {
                    headers: { Authorization: `Bearer ${localStorage.getItem('token-admin')}`}
                }
            }
        },
        methods:{
            async submit(){
               (this.idProp == null) ?
                await axios.post(`http://127.0.0.1:8001/api/${this.resource}`,this.form, this.config).then(function (response) {}).catch(function (error) {})
                :
                await axios.put(`http://127.0.0.1:8001/api/${this.resource}/${this.idProp}`,this.form, this.config).then(function (response) {}).catch(function (error) {})
            },
            onFileChange(e) {
                this.form.image = e.target.files[0];
                this.url = URL.createObjectURL(this.form.image);
                this.config = {headers: { Authorization: `Bearer ${localStorage.getItem('token-admin')}`, 'content-type': 'multipart/form-data' }}
            },
        },
        async mounted(){
            (this.idProp !=null ) ?
            await axios.get(`http://127.0.0.1:8001/api/${this.resource}/${this.idProp}`, this.config).then( (response) =>{this.form = response.data.data, this.url = response.data.data.image}) : '';
        },
    }
</script>
