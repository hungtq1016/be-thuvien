<template>
    <div>
        <div class="flex gap-1 py-2 flex-wrap">
            <div v-for="(item,index) in list" :key="index" class="rounded-lg bg-sky-200 border border-sky-600 py-[2px] px-1 flex items-center gap-x-1 group" >
                <span>{{ item.name }}</span>
                <button class="hidden group-hover:inline" type="button" @click="remove(index)">
                    <XMarkIcon class="w-3 h-3 text-red-600" />
                </button>
            </div>
        </div>
        <label for="input" class="block text-sm font-medium text-gray-700 py-2" >{{this.title}}</label >
        <div class="mt-1 rounded-lg relative">
            <!-- <input type="text" v-model="selected"
            class="absolute top-0 left-0 right-10 focus:ring-0 focus:outline-none border-none my-[1px] ml-2" /> -->
            <select id="input"  v-model="selected" @change="add"
            class="block w-full rounded-lg border border-gray-300 focus:ring-0 focus:outline-none focus:border-sky-600">
                <option v-for="(item,index) in resourceData" :key="index" :value="index">
                    {{ item.name }}
                </option>
            </select>
        </div>
    </div>
</template>

<script>
import {XMarkIcon} from "@heroicons/vue/24/outline";
import axios from 'axios';
export default {
    components:{XMarkIcon},
    props:['title','resource'],
    data() {
        return {
            resourceData:[{
                name:'null',
                id:null
            }],
            list: [],
            selected: null
        };
    },
    methods:{
        add(){
            this.list.indexOf(this.selectedId) === -1 ?
            this.list.push(this.selectedId) : alert('Đã tồn tại')
        },
        remove(index){
            this.list.splice(index,1)
        },
    },
    async mounted(){
        await axios.get(`/api/${this.resource}?limit=all`).then((response)=>{this.resourceData = response.data})
    },
    computed:{
        selectedId(){
            return this.resourceData[this.selected]
        }
    }
};
</script>
