<template>
    <div class="h-full dark:bg-zinc-900 bg-gray-50 overflow-hidden">
        <div class="max-w-sm mx-auto mt-24">
            <div class="py-8 px-4 rounded-md dark:bg-black bg-white shadow-xl">
                <form class="space-y-8" v-if="!isRegister">
                    <div class="space-y-8">
                        <div>
                            <div>
                                <h3
                                    class="text-4xl h-14 bg-clip-text text-transparent bg-gradient-to-r dark:from-red-500 dark:to-rose-600 from-sky-500 to-blue-600 text-center font-bold">
                                    Đăng Nhập
                                </h3>
                            </div>
                            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <div class="col-span-6">
                                    <div class="mt-1 flex rounded-md">
                                        <input type="email" v-model="form.email" placeholder="Email" name="email"
                                            id="email" autocomplete="email"
                                            class="block w-full min-w-0 flex-1 rounded-md text-lg sm:text-sm dark:bg-zinc-900 dark:text-zinc-100 dark:placeholder:text-zinc-100 py-3 dark:border-none focus:outline-none focus:ring-0 border-gray-200" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <div class="col-span-6">
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="password" v-model="form.password" name="password"
                                            placeholder="Mật Khẩu" id="password" autocomplete="password"
                                            class="block w-full min-w-0 flex-1 rounded-md text-lg sm:text-sm dark:bg-zinc-900 dark:text-zinc-100 dark:placeholder:text-zinc-100 py-3 dark:border-none focus:outline-none focus:ring-0 border-gray-200" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="pt-1">
                        <button type="button" @click.prevent="submit()"
                            class="inline-flex justify-center rounded-md border border-transparent dark:bg-red-600 bg-sky-600 w-full py-2 px-4 text-sm font-medium dark:text-white text-gray-100 shadow-sm hover:dark:bg-red-700 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Đăng Nhập
                        </button>
                    </div>
                </form>
                <form class="space-y-8" v-else>
                    <div class="space-y-8">
                        <div>
                            <div>
                                <h3
                                    class="text-4xl h-14 bg-clip-text text-transparent bg-gradient-to-r dark:from-red-500 dark:to-rose-600 from-sky-500 to-blue-600 text-center font-bold">
                                    Đăng Ký
                                </h3>
                            </div>
                            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <div class="col-span-6">
                                    <div class="mt-1 flex rounded-md">
                                        <input type="email" v-model="form.email" placeholder="Email" name="email"
                                            id="email" autocomplete="email"
                                            class="block w-full min-w-0 flex-1 rounded-md text-lg sm:text-sm dark:bg-zinc-900 dark:text-zinc-100 dark:placeholder:text-zinc-100 py-3 dark:border-none focus:outline-none focus:ring-0 border-gray-200" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <div class="col-span-6">
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="password" v-model="form.password" name="password"
                                            placeholder="Mật Khẩu" id="password" autocomplete="password"
                                            class="block w-full min-w-0 flex-1 rounded-md text-lg sm:text-sm dark:bg-zinc-900 dark:text-zinc-100 dark:placeholder:text-zinc-100 py-3 dark:border-none focus:outline-none focus:ring-0 border-gray-200" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 ">
                                <div class="col-span-6">
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="password" v-model="form.password" name="password"
                                            placeholder="Xác Nhận Mật Khẩu" id="password" autocomplete="password"
                                            class="block w-full min-w-0 flex-1 rounded-md text-lg sm:text-sm dark:bg-zinc-900 dark:text-zinc-100 dark:placeholder:text-zinc-100 py-3 dark:border-none focus:outline-none focus:ring-0 border-gray-200" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-1">
                        <button type="button" @click.prevent="submit()"
                            class="inline-flex justify-center rounded-md border border-transparent dark:bg-red-600 bg-sky-600 w-full py-2 px-4 text-sm font-medium dark:text-white text-gray-100 shadow-sm hover:dark:bg-red-700 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Đăng Ký
                        </button>
                    </div>
                </form>
                <div class="grid grid-cols-3 gap-x-2 mt-4">
                    <routerLink to="/" class="dark:bg-white rounded-md dark:text-red-600 border-gray-300 border text-gray-500 hover:bg-gray-100 dark:hover:bg-red-500 dark:hover:text-white dark:border-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-full mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </routerLink>
                    <div class="col-span-2 grid grid-cols-2 gap-x-2 dark:bg-zinc-900 p-1 rounded-md border border-gray-300 dark:border-none">
                        <button class="dark:text-white text-gray-500 hover:bg-gray-100 rounded-md py-2 dark:hover:bg-red-500" :class="{
                            'dark:bg-red-600 !text-white bg-sky-600  hover:bg-sky-500 dark:hover:bg-red-700':
                                !isRegister,
                        }" :disabled="!isRegister" @click="this.isRegister = !isRegister">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                        </button>
                        <button class="dark:text-white text-gray-500 hover:bg-gray-100 rounded-md py-2 dark:hover:bg-red-500" :class="{
                            'dark:bg-red-600 !text-white bg-sky-600 hover:bg-sky-500 dark:hover:bg-red-700':
                                isRegister,
                        }" :disabled="isRegister" @click="this.isRegister = !isRegister">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
export default {
    data() {
        return {
            isRegister: false,
            form: { email: "", password: "" },
        };
    },
    methods: {
        async submit() {
            const login = await axios
                .post(`/api/login`, this.form)
                .catch((error) => {
                    Swal.fire({
                        icon: "warning",
                        title: "Đăng Nhập Thất Bại",
                        text: "Nhập sai email hoặc mật khẩu!",
                        confirmButtonText: "Xác Nhận",
                        customClass: {
                            confirmButton:
                                "!bg-sky-600 dark:!bg-red-600 ring-0 outline-0",
                        },
                    });
                });
            if (login) {
                //Ma hoa cho role admin
                const today = new Date()
                const isAdmin = window.btoa(today.getMonth() + "admin");

                this.$cookies.set("ltoken",login.data.data.token, "7d");
                this.$cookies.set("info_user",login.data.data, "7d");
                console.log(login.data.data);
                if (login.data.data.role.id >= 3) {
                    //Neu co quyen admin thi moi duoc vao
                    this.$cookies.set(isAdmin, true, "7d");
                    this.$router.push({ name: "admin-dashboard" });
                } else {
                    //Khong thi la client
                    this.$router.push({ name: "home" });
                }
            }
        },
    },
    mounted(){
        this.isRegister = (this.$route.query.action == 'register') ? true : false
    }
};
</script>

<style lang="scss" scoped>

</style>
