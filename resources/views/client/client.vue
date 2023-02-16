<template>
  <div>
    <div ref="content" class="sr-only">Scroll to top</div>
    <TheHeader/>
    <div>
      <router-view></router-view>
    </div>
    <FooterComponent/>
    <div class="fixed bottom-2 right-2">
        <button @click="scrollToTop" class="bg-black text-white rounded-full">Top</button>
    </div>
  </div>
</template>

<script>
import TheHeader from "../../components/client/include/TheHeader.vue";
import { ref } from 'vue';
import FooterComponent from '../../components/client/include/FooterComponent.vue';

export default {
  components: {
    TheHeader,
    FooterComponent,
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
