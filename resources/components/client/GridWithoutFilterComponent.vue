<template>
    <div class="bg-white">
      <div class="py-16 sm:py-24 mx-4 xl:mx-auto xl:max-w-7xl xl:px-8">
        <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
          <h2 class="text-2xl font-bold tracking-tight text-gray-900">Tất Cả</h2>
        </div>

        <div class="mt-4 flow-root">
          <div class="-my-2">
            <div class="box-content py-2 ">
              <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-2 md:gap-x-4 md:gap-y-6">
                <router-link :to="{ name: 'RequestBook', params: { slug: item.slug },query:{title:item.title}}"
                v-for="item in items" :key="item.title"
                class="relative overflow-hidden rounded-lg hover:opacity-75 h-full">
                    <img :src="item.imageSrc" alt="" class="h-full w-full object-cover object-center" />
                  <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50" />
                  <span class="absolute inset-x-0 bottom-4 mt-auto text-center text-xl font-bold text-white">{{ item.title }}</span>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  const items = [
    { title: 'Hành Động', slug: 'sadsad', imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-category-01.jpg', },
    { title: 'Phiêu Lưu', slug: '3f2f', imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-category-02.jpg', },
    { title: 'Viễn Tưởng', slug: '32f', imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-category-04.jpg', },
    { title: 'Trinh Thám', slug: 'dsfdsf', imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-category-05.jpg', },
    { title: 'New Arrivals', slug: 'fdsdf', imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-category-01.jpg', },
    { title: 'Productivity', slug: '#', imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-category-02.jpg', },
    { title: 'Workspace', slug: '#', imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-category-04.jpg', },
    { title: 'Accessories', slug: '#', imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-category-05.jpg', },
    { title: 'Sale', slug: '#', imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-01-category-03.jpg' },
  ]
  </script>
