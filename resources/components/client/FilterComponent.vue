<template>
    <aside>
        <h2 class="sr-only">Filters</h2>

        <button type="button" class="inline-flex items-center lg:hidden" @click="mobileFiltersOpen = true" >
            <span class="text-sm font-medium text-gray-700">Filters</span>
            <PlusIcon class="ml-1 h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
        </button>

        <div class="hidden lg:block">
            <div class="space-y-5 divide-y divide-gray-200">
                <div v-for="(section, sectionIdx) in filters" :key="section.name" :class="sectionIdx === 0 ? null : 'pt-10'" >
                    <FilterItem :section="section" :options="section.options" />
                </div>
            </div>
        </div>
    </aside>
</template>

<script>
import FilterItem from './FilterItemComponent.vue'
export default {
    components:{FilterItem},
    data() {
        return {
            filters: [
                {
                    id: "author",
                    name: "Tác Giả",
                    options: [
                        { value: "all", label: "Tất cả" },
                        { value: "white", label: "White" },
                        { value: "beige", label: "Beige" },
                        { value: "blue", label: "Blue" },
                        { value: "brown", label: "Brown" },
                        { value: "green", label: "Green" },
                        { value: "purple", label: "Purple" },
                    ],
                },
                {
                    id: "category",
                    name: "Nhà Xuất Bản",
                    options: [
                        { value: "all", label: "Tất Cả" },
                        { value: "tees", label: "Tees" },
                        { value: "crewnecks", label: "Crewnecks" },
                        { value: "sweatshirts", label: "Sweatshirts" },
                        { value: "pants-shorts", label: "Pants & Shorts" },
                    ],
                },
                {
                    id: "tag",
                    name: "Nhãn",
                    options: [
                        { value: "xs", label: "XS" },
                        { value: "s", label: "S" },
                        { value: "m", label: "M" },
                        { value: "l", label: "L" },
                        { value: "xl", label: "XL" },
                        { value: "2xl", label: "2XL" },
                    ],
                },
            ],
        };
    },
};
</script>
