<template>
    <div
        class="mx-auto px-4 sm:px-6 md:px-8 dark:bg-zinc-700 rounded-lg dark:text-white bg-white text-black"
    >
        <div class="py-4 sm:py-6 md:py-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
                >
                    <div class="overflow-hidden">
                        <div class="py-4">
                            <label
                                for="search-table"
                                class="block text-sm font-medium text-gray-700 py-1"
                                >Tìm Kiếm</label
                            >
                            <div class="flex max-w-sm">
                                <div
                                    class="flex items-center border-gray-300 border rounded-l-lg border-r-0"
                                >
                                    <label for="search" class="sr-only"
                                        >Search</label
                                    >
                                    <select
                                        id="search-table"
                                        autocomplete="off"
                                        v-model="searchField"
                                        class="h-full border-transparent bg-transparent py-0 text-gray-900 focus:border-0 focus:ring-0 sm:text-sm"
                                    >
                                        <option
                                            v-for="label in label"
                                            :key="label.value"
                                            :value="label.value"
                                        >
                                            {{ label.text }}
                                        </option>
                                    </select>
                                </div>
                                <input
                                    type="text"
                                    id="search"
                                    v-model="searchValue"
                                    placeholder="Tìm tại đây"
                                    class="block w-full rounded-r-lg border-l-0 border border-gray-300 focus:border-gray-300 focus:ring-0 sm:text-sm"
                                />
                            </div>
                        </div>
                        <EasyDataTable
                            :headers="label"
                            :items="getDataFromState"
                            :search-field="searchField"
                            :search-value="searchValue"
                            table-class-name="!border-gray-300 py-2 rounded-lg"
                            body-row-class-name="even:bg-white odd:bg-gray-100"
                            body-item-class-name="!bg-transparent max-w-sm truncate"
                            body-expand-row-class-name="!bg-red-600"
                            :rows-per-page="currentShow"
                            hide-footer
                        >
                            <template #empty-message>
                                <img
                                    src="https://itc.edu.vn/Data/Sites/1/media/img/logo.png"
                                    class="animate-spin mx-auto py-6"
                                />
                            </template>
                            <template #item-image="item">
                                <img
                                    :src="item.image"
                                    :alt="item.name"
                                    class="w-16 h-16 object-cover rounded-full my-1"
                                    v-if="item.image"
                                />
                            </template>
                            <template #item-desc="{ desc, country }">
                                <span class="truncate">{{
                                    desc ? desc : country
                                }}</span>
                            </template>
                            <template #item-status="{ status }">
                                <button
                                    class="w-4 h-4 rounded-full"
                                    :class="
                                        status == 1
                                            ? 'bg-lime-600'
                                            : 'bg-red-600'
                                    "
                                ></button>
                            </template>
                            <template #item-operation>
                                <div class="flex gap-x-2">
                                    <button>
                                        <PencilIcon
                                            class="w-5 h-5 text-gray-600 hover:text-black"
                                        />
                                    </button>
                                    <button>
                                        <TrashIcon
                                            class="w-5 h-5 text-red-600 hover:animate-wiggle"
                                        />
                                    </button>
                                </div>
                            </template>
                        </EasyDataTable>
                        <div class="flex items-center justify-between border-t border-gray-200 bg-white py-3 gap-x-6">
                            <div>
                                <select id="location" v-model="currentShow" @change="updatePage()"
                                class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                  <option v-for="show in showPerPage" :key="show">{{show}}</option>
                                </select>
                              </div>
                            <div class="flex flex-1 justify-between sm:hidden">
                              <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                              <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                            </div>
                            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                              <div>
                                <p class="text-sm text-gray-700">
                                  Hiện từ {{ ' ' }} <span class="font-medium">1</span>
                                  {{ ' ' }} tới {{ ' ' }}
                                  <span class="font-medium">{{currentShow}}</span>
                                  {{ ' ' }} trong {{ ' ' }}
                                  <span class="font-medium">97</span> {{ ' ' }} kết quả
                                </p>
                              </div>
                              <div>
                                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                  <a href="#" class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
                                    <span class="sr-only">Previous</span>
                                    <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
                                  </a>
                                  <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                                  <a href="#" aria-current="page" class="relative z-10 inline-flex items-center border border-indigo-500 bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-600 focus:z-20">1</a>
                                  <a href="#" class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">2</a>
                                  <a href="#" class="relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex">3</a>
                                  <span class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700">...</span>
                                  <a href="#" class="relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex">8</a>
                                  <a href="#" class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">9</a>
                                  <a href="#" class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">10</a>
                                  <a href="#" class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
                                    <span class="sr-only">Next</span>
                                    <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
                                  </a>
                                </nav>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import { PencilIcon, TrashIcon } from "@heroicons/vue/24/outline";
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'

export default {
    components: { PencilIcon, TrashIcon ,ChevronLeftIcon, ChevronRightIcon},
    data() {
        return {
            currentShow:10,
            showPerPage : [5,10,25,50,100,200],
            data: {
                name: this.$route.path.split("/").slice(-1)[0],
                title: this.$route.meta.title,
            },
            searchField: "name",
            searchValue: "",
            label: [
                { value: "id", text: "ID", sortable: true },
                { value: "name", text: "Tên", sortable: true },
                { value: "image", text: "Hình ảnh", sortable: true },
                {
                    value: "desc",
                    text: "Thông tin",
                    sortable: true,
                    width: 300,
                },
                { value: "status", text: "Trạng thái", sortable: true },
                { value: "operation", text: "Tùy Chỉnh" },
            ],
            dataTable: [],
        };
    },
    mounted() {
        this.getDataTable({ resource: this.data.name, page: 1 ,limit:this.currentShow});
    },
    methods: {
        ...mapActions(["getDataTable", "destroyData", "updateStatus"]),
        updatePage(){
            this.getDataTable({ resource: this.data.name, page: 1 ,limit:this.currentShow});
        }
    },
    computed: {
        ...mapGetters(["getDataFromState"]),
    },
};
</script>
