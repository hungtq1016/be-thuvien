<template>
    <form>
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
                        placeholder="Nhập Quốc Gia" aria-describedby="name-description" />
                </div>
            </div>
            <div>
                <label for="gender" class="block text-sm font-medium dark:text-white">Giới Tính</label>
                <div class="mt-1">
                    <input type="text" name="name" id="gender" v-model="form.gender"
                        class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                        placeholder="Nhập Giới Tính" aria-describedby="name-description" />
                </div>
            </div>
            <div>
                <label for="yob" class="block text-sm font-medium dark:text-white">Năm Sinh</label>
                <div class="mt-1">
                    <input type="date" name="name" id="yob" v-model="form.yob"
                        class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white" />
                    </div>
            </div>
            <div>
                <label for="yod" class="block text-sm font-medium dark:text-white">Năm Mất</label>
                <div class="mt-1">
                    <input type="date" name="name" id="yod"  v-model="form.yod"
                        class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                        placeholder="Nhập Tên" aria-describedby="name-description" />
                </div>
            </div>
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
                form:{
                    name: '',
                    gender: '',
                    yob: '10/10/2000',
                    yod:'16/10/2000',
                    country: 'z'
                },
                name:'',
                config: {
                    headers: { Authorization: `Bearer ${localStorage.getItem('token-admin')}` }
                }
            }
        },
        methods:{
            async submit(){
               (this.idProp == null) ?
            await axios.post(`http://127.0.0.1:8001/api/${this.resource}`,{name:this.name}, this.config).then(function (response) {
            }).catch(function (error) {
                console.log('Error on Authentication');
            })
            :
            await axios.put(`http://127.0.0.1:8001/api/${this.resource}/${this.idProp}`,{name:this.name,status:1}, this.config).then(function (response) {
            }).catch(function (error) {
                console.log('Error on Authentication');
            });
            }
        },
        async mounted(){
            (this.idProp !=null ) ?
            await axios.get(`http://127.0.0.1:8001/api/${this.resource}/${this.idProp}`, this.config).then( (response) =>{this.form = response.data.data}) : '';
        },
        computed: {
  dob: {
    get() {
      return this.form.yob;
    },
    set(newValue) {
      this.form.yob = newValue;
    },
  },
},
    }
</script>
