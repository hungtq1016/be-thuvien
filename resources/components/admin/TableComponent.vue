<template>
    <div class="mx-auto px-4 sm:px-6 md:px-8 dark:bg-zinc-700 rounded-lg dark:text-white bg-white text-black">
        <div class="py-4 sm:py-6 md:py-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <span>search field:</span>
                        <select v-model="searchField">
                          <option>Tên</option>
                          <option>Hình ảnh</option>
                        </select>

                        <br/>

                        <span>search value: </span>
                        <input type="text" v-model="searchValue">
                        <EasyDataTable :headers="label" :items="getDataFromState" :search-field="searchField" :search-value="searchValue">
                            <template #item-image="item">
                                <img :src="item.image" :alt="item.name" class="w-16 h-16 object-cover rounded-full">
                            </template>
                            <template #item-desc="{ desc, country }">
                                <span>{{desc?desc:country}}</span>
                            </template>
                            <template #item-status="{ status }">
                                <button class="w-4 h-4 rounded-full" :class="status == 1 ? 'bg-lime-600':'bg-red-600'"></button>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    props: ["data"],
    data() {
        return {
            searchField:'name',
            searchValue:'',
            label:[
                {value:'id',text:'ID'},
                {value:'name',text:'Tên'},
                {value:'image',text:'Hình ảnh'},
                {value:'desc',text:'Thông tin'},
                {value:'status',text:'Trạng thái'},
            ]
        };
    },
     mounted() {
        this.getDataTable({resource:this.data.name,page:1})
    },
    methods: {
        ...mapActions(["getDataTable", "destroyData","updateStatus"]),
    },
    computed: {
        ...mapGetters(["getDataFromState"]),
    },

};
</script>
