<template>
    <div>
        <label for="input" class="block text-sm font-medium text-gray-700 pt-2" >{{this.title}}</label >
        <div class="pt-1 rounded-lg relative">
            <select id="input"  v-model="selected" @change="handleChange"
            class="block w-full rounded-lg border border-gray-300 focus:ring-0 focus:outline-none focus:border-sky-600">
                <option v-for="(item,index) in resourceData" :key="index" :value="item">
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
    props:['title','resource','data'],
    data() {
        return {
            resourceData:[{
                name:null,
                id:null
            }],
            selected:null,
        };
    },
    methods: {
        handleChange() {
            this.$emit('dataChange', this.selected.id)
        }
    },
    async mounted(){
        await axios.get(`/api/${this.resource}?limit=all`).then((response)=>{this.resourceData = response.data})
    }
};
</script>
