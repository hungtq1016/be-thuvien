<template>
    <section>
        <div class="relative bg-gray-50 dark:bg-black pt-6 pb-10">
            <div class="relative mx-4 md:mx-auto max-w-7xl">
                <div class="text-left">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl">
                        Đề Xuất
                    </h2>
                </div>
                <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-2">
                    <HorizontalItem v-for="value in data" :key="value.title" :value="value"/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import HorizontalItem from '../item/HorizontalItem.vue';
export default {
    data() {
        return {
            data: [
                {
                    title: "Boost your conversion rate",
                    slug: "dsfds-123",
                    category: { name: "Article", href: "#" },
                    description:
                        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.",
                    date: "Mar 16, 2020",
                    comments: "12",
                    imageUrl:
                        "https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80",
                    rating: "4.3",
                    author: {
                        name: "Roel Aufderehar",
                        href: "#",
                        imageUrl:
                            "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
                    },
                },
                {
                    title: "How to use search engine optimization to drive sales",
                    slug: "asd",
                    category: { name: "Video", href: "#" },
                    description:
                        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo laudantium.",
                    date: "Mar 10, 2020",
                    comments: "32",
                    imageUrl:
                        "https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80",
                    rating: "4.0",
                    author: {
                        name: "Brenna Goyette",
                        href: "#",
                        imageUrl:
                            "https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
                    },
                }
            ]
        }
    },
    components:{HorizontalItem}
}
</script>

<style lang="scss" scoped>

</style>
