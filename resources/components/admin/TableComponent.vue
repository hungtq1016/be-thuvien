<template>
  <div
    class="
      mx-auto
      px-4
      sm:px-6
      md:px-8
      dark:bg-zinc-700
      rounded-lg
      dark:text-white
      bg-white
      text-black
    "
  >
    <div class="py-4 sm:py-6 md:py-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden">
            <table class="min-w-full">
              <thead class="dark:text-white">
                <tr class="uppercase border-b-2 dark:border-white border-black">
                  <th
                    scope="col"
                    v-for="(label, labelIndex) in sortedArray"
                    :key="labelIndex"
                    class="px-3 py-3.5 text-left text-sm font-semibold"
                  >
                    {{ label }}
                  </th>
                  <th
                    scope="col"
                    class="px-3 py-3.5 text-sm font-semibold text-center"
                  >
                    STATUS
                  </th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="">
                <tr
                  v-for="(item, id) in data"
                  :key="item.name"
                  :class="
                    id % 2 === 0
                      ? 'dark:bg-zinc-900 hover:dark:bg-red-600 bg-gray-200 hover:bg-sky-300'
                      : 'hover:dark:bg-red-400 hover:bg-sky-200'
                  "
                  class="hover:dark:bg-red-600 group"
                >
                  <td
                    v-for="(label, labelIndex) in sortedArray"
                    :key="labelIndex"
                    class="whitespace-nowrap px-3 py-4 text-sm"
                  >
                    {{ item[label] }}
                  </td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-center">
                    <button
                      class="w-1 h-1 rounded-full p-2"
                      :class="
                        item.status == 1
                          ? 'bg-lime-500 hover:bg-lime-600'
                          : 'bg-red-600 hover:bg-red-700 dark:bg-amber-600'
                      "
                    ></button>
                  </td>
                  <td
                    class="
                      relative
                      whitespace-nowrap
                      py-4
                      pl-3
                      pr-4
                      text-right text-sm
                      font-medium
                      sm:pr-6
                    "
                  >
                    <button
                      type="button"
                      class="link-custom group-hover:text-white" @click="$emit('updateId',item.id);$emit('openModal')"
                    >
                      Chỉnh Sửa
                    </button>
                    /
                    <button
                      type="button"
                      class="link-custom group-hover:text-white"
                    >
                      Xóa
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <pagination
            v-model="page"
            :records="total"
            :per-page="per_page"
            @paginate="updatePage"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Pagination from "v-pagination-3";
export default {
  components: { Pagination },
  props: ["dataView", "remove"],
  data() {
    return {
      config: {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token-admin")}`,
        },
      },
      page: 1,
      total: 1,
      per_page: 1,
      labels: [],
      data: [],
    };
  },
  async mounted() {
    await axios
      .get(
        `http://127.0.0.1:8001/api/get-col-name/${this.dataView}`,
        this.config
      )
      .then((response) => (this.labels = response.data));
    await axios
      .get(
        `http://127.0.0.1:8001/api/${this.dataView}?page=${this.page}`,
        this.config
      )
      .then(
        (response) => (
          (this.data = response.data.data),
          (this.total = response.data.meta.total),
          (this.per_page = response.data.meta.per_page)
        )
      );
  },
  methods: {
    async updateData(){
      await axios.get(`http://127.0.0.1:8001/api/${this.dataView}?page=${this.page}`, this.config).then(response => (this.data = response.data.data));
    },
    async updatePage(value) {
      await axios.get(`http://127.0.0.1:8001/api/${this.dataView}?page=${value}`, this.config).then(response => (this.data = response.data.data));
    }
  },
  computed: {
    sortedArray() {
      return this.labels.filter((item) => !this.remove.find((e) => e == item));
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
