<template>
    <carousel :autoplay="4000" :wrap-around="true">
        <slide v-for="slide in slides" :key="slide">
            <img :src="slide.img" class="w-full object-cover" />
        </slide>

        <template #addons>
            <navigation />
            <pagination />
        </template>
    </carousel>
  </template>

<script>
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
export default {
    data(){
        return{
            slides:[
                {
                    img:'/banners/1.jpg'
                },
                {
                    img:'/banners/2.jpg'
                },
                {
                    img:'/banners/3.jpg'
                },
                {
                    img:'/banners/4.jpg'
                },
                {
                    img:'/banners/1.jpg'
                },
                {
                    img:'/banners/2.jpg'
                },
                {
                    img:'/banners/3.jpg'
                },
                {
                    img:'/banners/4.jpg'
                }
            ]
        }
    },
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
};
</script>
