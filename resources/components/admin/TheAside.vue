<template>
  <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
            <div class="flex min-h-0 flex-1 flex-col bg-zinc-900">
                <div class="flex h-16 flex-shrink-0 items-center bg-zinc-900 px-4">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=red&shade=600"
                        alt="Your Company" />
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
