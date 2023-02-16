<template>
    <div class="bg-white">
        <div
            class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8"
        >
            <!-- book details -->
            <div class="lg:max-w-lg lg:self-end">
                <nav aria-label="Categories">
                    <ol
                        role="list"
                        class="flex items-center gap-x-2 gap-y-1 flex-wrap"
                    >
                        <li
                            v-for="(category, index) in book.categories"
                            :key="category.id"
                        >
                            <div class="flex items-center text-sm">
                                <a
                                    :href="category.slug"
                                    class="font-medium text-gray-500 hover:text-gray-900"
                                    >{{ category.title }}</a
                                >
                                <svg
                                    v-if="index !== book.categories.length - 1"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                    class="ml-2 h-5 w-5 flex-shrink-0 text-gray-300"
                                >
                                    <path
                                        d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z"
                                    />
                                </svg>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="mt-4">
                    <h1
                        class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                    >
                        {{ book.title }}
                    </h1>
                </div>

                <section aria-labelledby="information-heading" class="my-4">
                    <h2 id="information-heading" class="sr-only">
                        Thông tin sách
                    </h2>

                    <div class="flex items-center">
                        <p class="text-lg text-gray-900 sm:text-xl">
                            {{ book.price }}
                        </p>

                        <div class="">
                            <h2 class="sr-only">Đánh giá</h2>
                            <div class="flex items-center gap-x-2">
                                <div>
                                    <StarRating
                                        :rating="book.rating"
                                        :read-only="true"
                                        :show-rating="false"
                                        star-size="16"
                                    />
                                    <p class="sr-only">
                                        {{ book.rating }} out of 5 stars
                                    </p>
                                </div>
                                <p class="text-gray-500 mt-1">
                                    {{ review }} đánh giá
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 space-y-6">
                        <p class="text-base text-gray-500">
                            {{ book.description }}
                        </p>
                    </div>

                    <div class="mt-6 flex items-center">
                        <CheckIcon
                            class="h-5 w-5 flex-shrink-0 text-green-500"
                            aria-hidden="true"
                        />
                        <p class="ml-2 text-sm text-gray-500">Còn sách</p>
                    </div>
                </section>
                <section
                    v-for="data in label"
                    :key="data.title"
                    class="border-t border-gray-300"
                >
                    <Disclosure v-slot="{ open }">
                        <DisclosureButton
                            class="group relative flex w-full items-center justify-between py-6 text-left"
                        >
                            <span
                                :class="[
                                    open ? 'text-sky-600' : 'text-gray-900',
                                    'text-sm font-medium',
                                ]"
                                >{{ data.title }}</span
                            >
                            <ChevronUpIcon
                                :class="
                                    open
                                        ? 'rotate-180 transform !text-sky-600'
                                        : ''
                                "
                                class="h-5 w-5 text-gray-900"
                            />
                        </DisclosureButton>
                        <DisclosurePanel
                            as="div"
                            class="flex gap-x-2 pb-6 items-center"
                        >
                            <div
                                v-for="(value, indexVal) in book[data.desc]"
                                :key="indexVal"
                                class="flex text-sm"
                            >
                                <span>{{ value }}</span>
                                <svg
                                    v-if="
                                        indexVal !== book[data.desc].length - 1
                                    "
                                    viewBox="0 0 512 512"
                                    fill="currentColor"
                                    aria-hidden="true"
                                    class="ml-2 w-1 flex-shrink-0 text-gray-900"
                                >
                                    <path
                                        d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512z"
                                    />
                                </svg>
                            </div>
                        </DisclosurePanel>
                    </Disclosure>
                </section>
            </div>

            <!-- book image -->
            <div
                class="mt-10 lg:col-start-2 lg:row-span-2 lg:mt-0 lg:self-center"
            >
                <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg">
                    <img
                        :src="book.imageSrc"
                        :alt="book.imageAlt"
                        class="h-full w-full object-cover object-center"
                    />
                </div>
            </div>

            <!-- book form -->
            <div
                class="mt-10 lg:col-start-1 lg:row-start-2 lg:max-w-lg lg:self-start"
            >
                <section aria-labelledby="options-heading">
                    <h2 id="options-heading" class="sr-only">book options</h2>

                    <RadioGroup v-model="selectedSeries">
                        <RadioGroupLabel
                            class="block text-sm font-medium text-gray-700"
                            >Cùng Loại</RadioGroupLabel
                        >
                        <div class="mt-1 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <RadioGroupOption
                                as="template"
                                v-for="series in book.series"
                                :key="series.title"
                                :value="series"
                                v-slot="{ active, checked }"
                            >
                                <div
                                    :class="[
                                        active ? 'ring-2 ring-indigo-500' : '',
                                        'relative block cursor-pointer rounded-lg border border-gray-300 p-4 focus:outline-none',
                                    ]"
                                >
                                    <RadioGroupLabel
                                        as="p"
                                        class="text-base font-medium text-gray-900"
                                        >{{ series.title }}</RadioGroupLabel
                                    >
                                    <RadioGroupDescription
                                        as="p"
                                        class="mt-1 text-sm text-gray-500"
                                        >{{
                                            series.title
                                        }}</RadioGroupDescription
                                    >
                                    <div
                                        :class="[
                                            active ? 'border' : 'border-2',
                                            checked
                                                ? 'border-indigo-500'
                                                : 'border-transparent',
                                            'pointer-events-none absolute -inset-px rounded-lg',
                                        ]"
                                        aria-hidden="true"
                                    />
                                </div>
                            </RadioGroupOption>
                        </div>
                    </RadioGroup>
                    <div class="flex pt-6 pb-4 gap-x-4">
                        <button
                            type="button"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="light"
                            class="flex-auto px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-sky-700 hover:shadow-lg focus:bg-sky-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-800 active:shadow-lg transition duration-150 ease-in-out"
                        >
                            Mượn Sách
                        </button>
                        <button
                            type="button"
                            class="flex items-center justify-center rounded-md py-3 px-3 text-red-600 hover:bg-gray-100 hover:text-red-500 border border-red-600"
                        >
                            <HeartIcon
                                class="h-6 w-6 flex-shrink-0"
                                aria-hidden="true"
                            />
                            <span class="sr-only">Add to favorites</span>
                        </button>
                    </div>
                </section>
            </div>
        </div>
        <section>
            <div
                class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-12 lg:gap-x-8 lg:py-16 lg:px-8"
            >
                <div class="lg:col-span-4">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                        Customer Reviews
                    </h2>

                    <div class="mt-3 flex items-center">
                        <div>
                            <div class="flex items-center">
                                <StarIcon
                                    v-for="rating in [0, 1, 2, 3, 4]"
                                    :key="rating"
                                    :class="[
                                        reviews.average > rating
                                            ? 'text-yellow-400'
                                            : 'text-gray-300',
                                        'flex-shrink-0 h-5 w-5',
                                    ]"
                                    aria-hidden="true"
                                />
                            </div>
                            <p class="sr-only">
                                {{ reviews.average }} out of 5 stars
                            </p>
                        </div>
                        <p class="ml-2 text-sm text-gray-900">
                            Based on {{ reviews.totalCount }} reviews
                        </p>
                    </div>

                    <div class="mt-6">
                        <h3 class="sr-only">Review data</h3>

                        <dl class="space-y-3">
                            <div
                                v-for="count in reviews.counts"
                                :key="count.rating"
                                class="flex items-center text-sm"
                            >
                                <dt class="flex flex-1 items-center">
                                    <p class="w-3 font-medium text-gray-900">
                                        {{ count.rating
                                        }}<span class="sr-only">
                                            star reviews</span
                                        >
                                    </p>
                                    <div
                                        aria-hidden="true"
                                        class="ml-1 flex flex-1 items-center"
                                    >
                                        <StarIcon
                                            :class="[
                                                count.count > 0
                                                    ? 'text-yellow-400'
                                                    : 'text-gray-300',
                                                'flex-shrink-0 h-5 w-5',
                                            ]"
                                            aria-hidden="true"
                                        />

                                        <div class="relative ml-3 flex-1">
                                            <div
                                                class="h-3 rounded-full border border-gray-200 bg-gray-100"
                                            />
                                            <div
                                                v-if="count.count > 0"
                                                class="absolute inset-y-0 rounded-full border border-yellow-400 bg-yellow-400"
                                                :style="{
                                                    width: `calc(${count.count} / ${reviews.totalCount} * 100%)`,
                                                }"
                                            />
                                        </div>
                                    </div>
                                </dt>
                                <dd
                                    class="ml-3 w-10 text-right text-sm tabular-nums text-gray-900"
                                >
                                    {{
                                        Math.round(
                                            (count.count / reviews.totalCount) *
                                                100
                                        )
                                    }}%
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="mt-10">
                        <h3 class="text-lg font-medium text-gray-900">
                            Share your thoughts
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            If you’ve used this product, share your thoughts
                            with other customers
                        </p>

                        <a
                            href="#"
                            class="mt-6 inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-50 sm:w-auto lg:w-full"
                            >Write a review</a
                        >
                    </div>
                </div>

                <div class="mt-16 lg:col-span-7 lg:col-start-6 lg:mt-0">
                    <h3 class="sr-only">Recent reviews</h3>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Search candidates</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <div class="relative flex flex-grow items-stretch focus-within:z-10">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                              <UsersIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                            </div>
                            <input type="email" title="email" id="email" class="block w-full rounded-none rounded-l-md border-gray-300 pl-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="John Smith" />
                          </div>
                          <button type="button" class="relative -ml-px inline-flex items-center space-x-2 rounded-r-md border border-gray-300 bg-gray-50 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                            <BarsArrowUpIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                            <span>Sort</span>
                          </button>
                        </div>
                      </div>
                    <div class="flow-root">
                        <div class="-my-12 divide-y divide-gray-200">
                            <div
                                v-for="review in reviews.featured"
                                :key="review.id"
                                class="py-12"
                            >
                                <div class="flex items-center">
                                    <img
                                        :src="review.avatarSrc"
                                        :alt="`${review.author}.`"
                                        class="h-12 w-12 rounded-full"
                                    />
                                    <div class="ml-4">
                                        <h4
                                            class="text-sm font-bold text-gray-900"
                                        >
                                            {{ review.author }}
                                        </h4>
                                        <div class="mt-1 flex items-center">
                                            <StarIcon
                                                v-for="rating in [
                                                    0, 1, 2, 3, 4,
                                                ]"
                                                :key="rating"
                                                :class="[
                                                    review.rating > rating
                                                        ? 'text-yellow-400'
                                                        : 'text-gray-300',
                                                    'h-5 w-5 flex-shrink-0',
                                                ]"
                                                aria-hidden="true"
                                            />
                                        </div>
                                        <p class="sr-only">
                                            {{ review.rating }} out of 5 stars
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="mt-4 space-y-6 text-base italic text-gray-600"
                                    v-html="review.content"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <Section :section="section" />

    </div>
</template>
<script>
import Section from '../../components/client/home/Section.vue';
import StarRating from "vue-star-rating";
import { CheckIcon,HeartIcon,ChevronUpIcon  ,StarIcon} from "@heroicons/vue/20/solid";
import { RadioGroup, RadioGroupDescription, RadioGroupLabel, RadioGroupOption,  Disclosure, DisclosureButton, DisclosurePanel} from "@headlessui/vue";

export default {
    components: { StarRating,CheckIcon,RadioGroup, RadioGroupDescription, RadioGroupLabel,
        RadioGroupOption,Disclosure, DisclosureButton, DisclosurePanel ,HeartIcon,ChevronUpIcon,StarIcon,Section },
    data() {
        return {
            selectedSeries: "",
            book: {
                title: "Cafe Sáng Cùng Tony",
                href: "#",
                rating: 4.3,
                review: 1244,
                description:
                    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque quisquam voluptatem quae iste praesentium quaerat dignissimos ipsam alias quo. Iste ex, cumque libero aut ab ducimus doloribus quisquam excepturi voluptas.",
                imageSrc:
                    "https://chiasemoi.com/wp-content/uploads/2017/12/ca-phe-cung-tony.jpg",
                imageAlt: "Cafe Sáng Cùng Tony",
                categories: [
                    { id: 1, title: "Hành Động", slug: "#" },
                    { id: 2, title: "Viễn Tưởng", slug: "#" },
                    { id: 3, title: "Phiêu Lưu", slug: "#" },
                    { id: 4, title: "Khoa Học Không Gian", slug: "#" },
                ],
                series: [
                    { title: "18L", id: "asdasdas" },
                    { title: "20L", id: "132dasd" },
                ],
                author:['Tony','Test'],
                publisher:['NXB Lao Động'],
                specialization:null,
                bookshelf:['A1'],
                tag:['Tâm lý','Thường ngày']
            },
            label:[
                {title:'Thông tin suất bản',desc:'publisher'},
                {title:'Tác giả',desc:'author'},
                {title:'Chuyên ngành',desc:'specialization'},
                {title:'Kệ Sách',desc:'bookshelf'},
                {title:'Nhãn',desc:'tag'},
            ],
            section:{
                title:'Sách liên quan',
                desc:null,
                slug:'same',
                limit:4
            },
            reviews : {
                average: 4,
                totalCount: 1624,
                counts: [
                { rating: 5, count: 1019 },
                { rating: 4, count: 162 },
                { rating: 3, count: 97 },
                { rating: 2, count: 199 },
                { rating: 1, count: 147 },
                ],
                featured: [
                {
                    id: 1,
                    rating: 5,
                    content: `
                    <p>This is the bag of my dreams. I took it on my last vacation and was able to fit an absurd amount of snacks for the many long and hungry flights.</p>
                    `,
                    author: 'Emily Selman',
                    avatarSrc:
                    'https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80',
                },
                // More reviews...
                ],
            }
        }
    }
}
</script>
