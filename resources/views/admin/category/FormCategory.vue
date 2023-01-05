<template>
    <form>
        <div class="space-y-3">
            <div>
                <label for="name" class="block text-sm font-medium dark:text-white">Tên asdas</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                        class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                        placeholder="name" aria-describedby="name-description" v-model="name" />
                </div>
            </div>
            <!-- <div>
                        <label for="email" class="block text-sm font-medium dark:text-white">Email</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email"
                                class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black  focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                                placeholder="you@example.com" aria-describedby="email-description" />
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium dark:text-white">Country</label>
                        <div class="mt-1">
                            <select id="country" name="country" autocomplete="country-name"
                                class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="cover-photo" class="block text-sm font-medium dark:text-white">Cover photo</label>
                        <div
                            class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 hover:border-gray-600 dark:border-gray-600 hover:dark:border-gray-300 px-6 pt-5 pb-6 dark:bg-zinc-900 bg-gray-100">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer rounded-md bg-white px-2 font-medium dark:text-red-600 text-sky-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-red-500 focus-within:ring-offset-2 hover:text-red-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1 dark:text-white">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-300">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="about" class="block text-sm font-medium dark:text-white">About</label>
                        <div class="mt-1">
                            <textarea id="about" name="about" rows="5"
                                class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white resize-none"></textarea>
                        </div>
                        <p class="mt-2 text-sm dark:text-white">Write a few sentences about yourself.</p>
                    </div> -->
            <div class="flex justify-between pt-2">
                <button type="button" @click="$emit('closeModal')"
                    class="inline-block px-6 py-2 border-2 dark:border-red-600 dark:text-red-600 border-sky-600 text-sky-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Trở
                    về</button>
                <button type="submit" @click.prevent="submit()" @click="$emit('closeModal')"
                    class="inline-block px-6 py-2.5 dark:bg-red-600 bg-sky-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:dark:bg-red-700 hover:bg-sky-700 hover:shadow-lg focus:dark:bg-red-700 focus:bg-sky-600 focus:shadow-lg focus:outline-none focus:ring-0  active:shadow-lg transition duration-150 ease-in-out">Xác
                    Nhận</button>
            </div>
        </div>
    </form>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name:'',
            config: {
                headers: { Authorization: `Bearer ${localStorage.getItem('token-admin')}` }
            }
        }
    },
    props: [ 'idProp'],
    methods: {
        async submit() {
            (this.id ==null ) ?
            await axios.post(`http://127.0.0.1:8001/api/category`,{name:this.name}, this.config).then(function (response) {
                console.log('Authenticated');
            }).catch(function (error) {
                console.log('Error on Authentication');
            })
            :
            await axios.put(`http://127.0.0.1:8001/api/category/${this.id}`,{name:this.name,status:1}, this.config).then(function (response) {
                console.log('Authenticated');
            }).catch(function (error) {
                console.log('Error on Authentication');
            });
        },
    },
    async mounted(){
        (this.id !=null ) ?
        await axios.get(`http://127.0.0.1:8001/api/category/${this.id}`, this.config).then( (response) =>{this.name = response.data.data.name}) : '';
    }
};
</script>

<style lang="scss" scoped>

</style>
