<template>
    <div class="bg-white dark:bg-black">
        <Recommend/>
        <Section v-for="item in section" :key="item.slug" :section="item"/>
        <div class="bg-sky-200 dark:bg-red-600">
            <div class="max-w-7xl mx-auto py-4 text-center ">
                <h1 class="text-4xl font-bold leading-[52px] text-white dark:text-gray-200">Theo thể loại</h1>
            </div>
        </div>
        <div class="grid grid-cols-2">

        </div>
        <ByCategory v-for="item in category" :key="item.slug" :category="item"/>
    </div>
</template>

<script>
    import Recommend from "../../../components/client/home/Recommend.vue";
    import Section from "../../../components/client/home/Section.vue";
    import ByCategory from "../../../components/client/home/ByCategory.vue";

    export default {
        components: { Recommend,Section,ByCategory},
        data(){
            return{
                section:[
                    {
                        title:'Xem Nhiều',
                        desc:'Tài liệu được mượn nhiều nhất trong tất cả thời gian',
                        slug:'hot',
                        limit:4
                    },
                    {
                        title:'Mới Nhất',
                        desc:'Tài liệu mới được thêm vào',
                        slug:'new',
                        limit:4
                    },
                    {
                        title:'Top tháng',
                        desc:'Được mượn nhiều nhất trong tháng vừa qua',
                        slug:'monthly',
                        limit:4
                    },
                    {
                        title:'Theo Ngành',
                        desc:'Tài liệu chuyên ngành',
                        slug:'subject',
                        limit:4
                    },
                ],
                category:[
                    {
                        title:'Hành Động',
                        desc:'Tài liệu...',
                        slug:'action',
                        limit:3
                    },
                    {
                        title:'Phiêu Lưu',
                        desc:'Tài liệu...',
                        slug:'advanture',
                        limit:3
                    },
                    {
                        title:'Cổ Tích',
                        desc:'Tài liệu...',
                        slug:'myth',
                        limit:3
                    },
                    {
                        title:'test2',
                        desc:'Tài liệu...',
                        slug:'test2',
                        limit:3
                    },
                ]
            }
        }
    };
</script>

<script setup>



</script>
