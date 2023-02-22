<template>
  <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
            <div class="flex min-h-0 flex-1 flex-col dark:bg-zinc-900 bg-white">
                <div class="flex h-16 flex-shrink-0 items-center dark:bg-zinc-900 bg-white px-4">
                    <router-link to="/admin/"><img class="w-14 h-14 object-cover" src="/logo/logo.png"
                        alt="ITC" /></router-link>
                </div>
                <div class="flex flex-1 flex-col overflow-y-auto">
                    <nav class="flex-1 space-y-1 px-2 py-4">
                        <TheNavigationItem/>
                    </nav>
                </div>
            </div>
        </div>
</template>

<script>
  import TheNavigationItem from '../../components/admin/TheNavigationItem.vue';
  export default {
    components:{
      TheNavigationItem
    }
  }
</script>
