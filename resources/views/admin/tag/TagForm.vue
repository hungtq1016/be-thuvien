<template>
    <form>
        <div class="space-y-3">
            <div>
                <label for="name" class="block text-sm font-medium dark:text-white">Tên</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name" v-model="this.idProp"
                        class="block w-full dark:bg-zinc-900 bg-gray-100  border-b-2 border-0 border-slate-200 dark:border-slate-800 hover:dark:border-white focus:dark:border-white hover:border-black focus:border-black focus:ring-0 focus:outline-0 sm:text-sm dark:text-white"
                        placeholder="name" aria-describedby="name-description" />
                </div>
            </div>
            <div class="flex justify-between pt-2">
                <button type="button"
                    class="inline-block px-6 py-2 border-2 dark:border-red-600 dark:text-red-600 border-sky-600 text-sky-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Trở
                    về</button>
                <button type="button" @click.prevent="submit()"
                    class="inline-block px-6 py-2.5 dark:bg-red-600 bg-sky-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:dark:bg-red-700 hover:bg-sky-700 hover:shadow-lg focus:dark:bg-red-700 focus:bg-sky-600 focus:shadow-lg focus:outline-none focus:ring-0  active:shadow-lg transition duration-150 ease-in-out">Xác
                    Nhận</button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props:['idProp'],
        data(){
            return{
                name:String
            }
        },
        methods:{
             submit(){
               (this.idProp == null) ? console.log(this.idProp) : console.log(this.idProp);
            //    await axios.post().then().catch() :
                // await axios.post().then().catch();
            }
        }
    }
</script>


<style lang="scss" scoped>

</style>
