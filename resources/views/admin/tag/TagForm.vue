<template>
    <form>
        <div class="space-y-3">
            <div>
                <label for="name" class="block text-sm font-medium dark:text-white">Tên</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name" v-model="name"
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
    export default {
        props:['idProp','resource'],
        data(){
            return{
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
        await axios.get(`http://127.0.0.1:8001/api/${this.resource}/${this.idProp}`, this.config).then( (response) =>{this.name = response.data.data.name}) : '';
    }
    }
</script>
