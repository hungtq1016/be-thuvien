<template>
    <div class="mx-auto px-4 sm:px-6 md:px-8 bg-zinc-700 rounded-lg text-white">
        <!-- Replace with your content -->
        <div class="max-w-lg mx-auto py-4 sm:py-6 md:py-8">
            <form action="">
                <div class="space-y-3">
                    <div>
                        <label for="name" class="block text-sm font-medium text-white">Name</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                class="block w-full bg-zinc-900 hover:border-white border-b-2 border-0 focus:border-white focus:ring-0 focus:outline-0 sm:text-sm"
                                placeholder="name" aria-describedby="name-description" />
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-white">Email</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email"
                                class="block w-full bg-zinc-900 hover:border-white border-b-2 border-0 focus:border-white  focus:ring-0 focus:outline-0 sm:text-sm"
                                placeholder="you@example.com" aria-describedby="email-description" />
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium ">Country</label>
                        <div class="mt-1">
                            <select id="country" name="country" autocomplete="country-name"
                                class="block w-full bg-zinc-900 hover:border-white border-b-2 border-0 focus:border-white focus:ring-0 focus:outline-0 sm:text-sm">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="cover-photo" class="block text-sm font-medium">Cover photo</label>
                        <div
                            class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6 bg-zinc-900">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer rounded-md bg-white px-2 font-medium text-red-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-red-500 focus-within:ring-offset-2 hover:text-red-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1 text-white">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-300">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="about" class="block text-sm font-medium ">About</label>
                        <div class="mt-1">
                            <textarea id="about" name="about" rows="5"
                                class="block w-full bg-zinc-900 hover:border-white border-b-2 border-0 focus:border-white focus:ring-0 focus:outline-0 sm:text-sm resize-none"></textarea>
                        </div>
                        <p class="mt-2 text-sm ">Write a few sentences about yourself.</p>
                    </div>
                    <div class="flex justify-between pt-2">
                        <router-link to="/admin/users"
                            class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Trở
                            về</router-link>
                        <button type="submit"
                            class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Xác
                            Nhận</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /End replace -->
    </div>
</template>

<script>

export default {};
</script>

<style lang="scss" scoped>

</style>
