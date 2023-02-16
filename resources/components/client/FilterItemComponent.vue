<template>
    <fieldset :class="{'h-32 overflow-y-hidden ':!isOpen}" >
        <legend class="block text-sm font-medium text-gray-900">
            {{ section.name }}
        </legend>
        <div class="space-y-3 pt-6">
            <div v-for="option in options" :key="option.value"  class="flex items-center" >
                <input :id="`${section.id}-${optionIdx}`" :name="`${section.id}[]`" :value="option.value" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                <label :for="`${section.id}-${optionIdx}`" class="ml-3 text-sm text-gray-600" >{{ option.label }}</label >
            </div>
        </div>
    </fieldset>
    <div class="pt-2 flex flex-col items-center group" :class="{'!flex-col-reverse':isOpen}">
        <button class="text-sky-600 group-hover:text-sky-700" @click="this.isOpen = !isOpen">{{ !this.isOpen ?'Xem Thêm':'Thu Gọn' }}</button>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" v-if="!isOpen"
        class="w-2 fill-sky-600 group-hover:fill-sky-700 group-hover:animate-bounce"><path d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" v-else
        class="w-2 fill-sky-600 group-hover:fill-sky-700 group-hover:animate-bounce"><path d="M169.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L192 205.3 54.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z"/></svg>
    </div>
</template>

<script>
    export default {
        props:['options','section'],
        data(){
            return{
                isOpen:false
            }
        }
    }
</script>
