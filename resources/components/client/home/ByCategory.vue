<template>
    <section>
        <div class="relative bg-gray-50 dark:bg-black px-6 py-10 lg:px-8 lg:py-16">
            <div class="absolute inset-0">
                <div class="h-1/3 bg-white dark:bg-zinc-900 sm:h-2/3" />
            </div>
            <div class="relative mx-auto max-w-7xl">
                <div class="text-left">
                    <div class="flex item-centers justify-between">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl ">
                            {{category.title}}
                        </h2>
                        <router-link :to="'/category/'+category.slug"
                            class="text-lg text-sky-500  hover:text-sky-600 dark:text-red-500 dark:hover:text-red-600">
                            Xem thêm</router-link>
                    </div>
                    <!-- <p class="mt-3 text-xl text-gray-500 dark:text-gray-300 sm:mt-4">
                        {{category.desc}}.
                    </p> -->
                </div>
                <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none grid-cols-1  lg:grid-cols-3">
                    <HorizontalItem v-for="post in books" :key="post.title" :value="post"
                        class="flex flex-col overflow-hidden rounded-lg shadow-lg" />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import HorizontalItem from "../../../components/client/item/HorizontalItem.vue";

    export default {
        props:['category'],
        components: {
            HorizontalItem
        },
        data() {
        return {
            books: [
                {
                    title: "Boost your conversion rate",
                    slug: "dfghdf-1asd",
                    category: { name: "Article", href: "#" },
                    description:
                        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.",
                    date: "Mar 16, 2020",
                    comments: "2",
                    imageUrl:
                        "https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80",
                    rating: "4.0",
                    author: {
                        name: "Roel Aufderehar",
                        href: "#",
                        imageUrl:
                            "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
                    },
                },
                {
                    title: "How to use search engine optimization to drive sales",
                    slug: "sadsa-123",
                    category: { name: "Video", href: "#" },
                    description:
                        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo laudantium.",
                    date: "Mar 10, 2020",
                    comments: "0",
                    imageUrl:
                        "https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80",
                    rating: "5.0",
                    author: {
                        name: "Brenna Goyette",
                        href: "#",
                        imageUrl:
                            "https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
                    },
                },
                {
                    title: "Improve your customer experience",
                    slug: "sad-sda",
                    category: { name: "Case Study", href: "#" },
                    description:
                        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint harum rerum voluptatem quo recusandae magni placeat saepe molestiae, sed excepturi cumque corporis perferendis hic.",
                    date: "Feb 12, 2020",
                    comments: "1",
                    imageUrl:
                        "https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80",
                    rating: "5.0",
                    author: {
                        name: "Daniela Metz",
                        href: "#",
                        imageUrl:
                            "https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
                    },
                },
            ]
        }
    }
    }
</script>
