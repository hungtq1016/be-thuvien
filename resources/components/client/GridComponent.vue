<template>
    <section aria-labelledby="product-heading" class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
        <h2 id="product-heading" class="sr-only">Books</h2>
        <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">
          <VerticalItem v-for="book in books" :key="book.id" :value="book"/>
        </div>
      </section>
</template>

<script>
import VerticalItem from './item/VerticalItem.vue'
    export default {
        data(){
            return{
                books: [
                {
                    title: "Boost your conversion rate",
                    slug: "2#2132",
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
                    slug: "giao-adas",
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
                    slug: "23ddd",
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
        },
        components:{VerticalItem}
    }
</script>

<style lang="scss" scoped>

</style>
