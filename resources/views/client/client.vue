<template>
  <div class="h-[200vh]">
    <TheHeader :class="this.scrollDirection  == 'up' || this.lastScrollY <= 30 ?'block':'hidden'"/>
    <div class="pt-24">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import TheHeader from "../../components/client/include/TheHeader.vue";
export default {
    data(){
        return{
            scrollDirection :null,
            lastScrollY:0,
        }
    },
  components: {
    TheHeader,
  },
  created() {
    window.addEventListener("scroll", this.updateScrollDirection);
  },
  destroyed() {
    window.removeEventListener("scroll");
  },
  methods: {
    updateScrollDirection(){
        const scrollY = window.pageYOffset;
        const direction = scrollY > this.lastScrollY ? "down" : "up";
        if (
          direction !== this.scrollDirection &&
          (scrollY - this.lastScrollY > 10 || scrollY - this.lastScrollY < -10)
        ) {
            this.scrollDirection = direction;
        }
        this.lastScrollY = scrollY > 0 ? scrollY : 0;
    }
  },
};
</script>
