<template>
  <div>
    <div ref="content" class="sr-only">Scroll to top</div>
    <TheHeader/>
    <div class=" h-[200vh]" >
      <router-view></router-view>
    </div>
    <div class="fixed bottom-2 right-2">
        <button @click="scrollToTop" class="bg-black text-white rounded-full">Top</button>
    </div>
  </div>
</template>

<script>
import TheHeader from "../../components/client/include/TheHeader.vue";
import { ref } from 'vue';

export default {
  components: {
    TheHeader,
  },
  setup() {
    const content = ref(null);

    const scrollToTop = () => {
      content.value.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    };

    return {
      content,
      scrollToTop
    };
  }
};
</script>
