<template>
    <table class="min-w-full">
              <thead class="dark:text-white">
                <tr class="uppercase border-b-2 dark:border-white border-black">
                  <th scope="col" v-for="(label, labelIndex) in labels" :key="labelIndex"
                  class="px-3 py-3.5 text-left text-sm font-semibold">{{label.name}}</th>
                  <th scope="col" class="px-3 py-3.5 text-sm font-semibold text-center">Trạng Thái</th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="">
                <tr v-for="(item, id) in data" :key="item.name"
                  :class="id % 2 === 0 ? 'dark:bg-zinc-900 hover:dark:bg-red-600 bg-gray-200 hover:bg-sky-300' : 'hover:dark:bg-red-400 hover:bg-sky-200'"
                  class="hover:dark:bg-red-600 group">
                  <td v-for="(label, labelIndex) in labels" :key="labelIndex"
                  class="whitespace-nowrap px-3 py-4 text-sm ">{{ item[label.field] }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-center">
                    <button class="w-1 h-1  rounded-full p-2"  @click="update(item);$emit('update')"
                    :class="item.status == 1 ? 'bg-lime-500 hover:bg-lime-600' : 'bg-red-600 hover:bg-red-700 dark:bg-amber-600'"></button>
                  </td>
                  <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                    <button type="button" @click="$emit('openModal'),$emit('query',item.id)" class="link-custom group-hover:text-white">Edit</button> /
                    <button type="button" @click="destroy(item.id);$emit('update')" class="link-custom group-hover:text-white">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
</template>

<script>
import axios from 'axios'
    export default {
      data(){
        return{
          isShow : Number,
          config: {
                headers: { Authorization: `Bearer ${localStorage.getItem('token-admin')}` }
            }
        }
      },
        props:{
            labels:{
                required: true,
            },
            data:{
                required: true,
            }
        },
        methods:{
          async destroy(value){
            await axios.delete(`http://127.0.0.1:8001/api/category/${value}`, this.config);
          },
          async update(payload){
            (payload.status == 1) ? this.isShow = 0 : this.isShow = 1;
            await axios.put(`http://127.0.0.1:8001/api/category/${payload.id}/update`,{status:this.isShow}, this.config);
          }
        }
    }
</script>

<style lang="scss" scoped>

</style>