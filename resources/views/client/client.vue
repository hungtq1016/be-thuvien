<template>
  <div>
    <TheHeader/>
    <div class="mt-14 md:mt-24">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import TheHeader from "../../components/client/include/TheHeader.vue";
export default {
  components: {
    TheHeader,
  }
};
</script>
