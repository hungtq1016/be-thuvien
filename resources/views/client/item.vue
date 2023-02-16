<template>
    <BannerConponent :title="this.$route.query.title"/>
    <main class="mx-auto max-w-2xl px-4 lg:max-w-7xl lg:px-8">
        <div class="border-b border-gray-200 pt-24 pb-10">
          <h1 class="text-4xl font-bold tracking-tight text-gray-900">{{this.$route.query.title}}</h1>
        </div>

        <div class="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
            <FilterComponent/>
            <GridComponent/>
        </div>
      </main>
</template>

<script>
import BannerConponent from "../../components/client/banner/BannerConponent.vue";
import GridComponent from "../../components/client/GridComponent.vue";
import FilterComponent from "../../components/client/FilterComponent.vue";

export default {
    components: { BannerConponent,GridComponent,FilterComponent},
};
</script>
<script setup>
  import { ref } from 'vue'

  </script>
