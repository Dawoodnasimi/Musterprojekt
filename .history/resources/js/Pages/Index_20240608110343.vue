<script setup>
import { defineProps, ref } from "vue";
import axios from "axios";

defineProps({
    posts: Object,
});

//https://www.youtube.com/watch?v=V-FhBu7agiM
</script>

<template>
    <Head title="Posts" />

    <div
        class="mx-auto p-5 grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3"
    >
        <div
            class="bg-gray p-5 rounded-lg border border-gray-300 shadow-lg"
            v-for="(post, index) in posts"
            :key="index"
        >
            <h2 class="text-2xl font-bold pb-2">{{ post.title }}</h2>
            <p class="text-gray-500 pb-2">{{ post.content }}</p>
            <strong
                ><span class="text-black-500"
                    >{{ post.author }} {{ post.id }}</span
                ></strong
            >
            <br />
            <div class="space-x-2">
                <Link
                    class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-blue-600"
                    :href="`/posts/${post.id}`"
                    as="button"
                >
                    Read More
                </Link>
                <Link
                    class="bg-green-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-green-600"
                    :href="`posts/edit/${post.id}`"
                    as="button"
                >
                    Edit Post
                </Link>
                <button
                    class="bg-red-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-red-600"
                    @click="showConfirmation = true"
                >
                    Delete Post
                </button>

                <div
                    v-if="showConfirmation"
                    class="fixed z-10 inset-0 overflow-y-auto"
                    aria-labelledby="modal-title"
                    role="dialog"
                    aria-modal="true"
                >
                    <div
                        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                    >
                        <div
                            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                            aria-hidden="true"
                        ></div>

                        <span
                            class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true"
                            >&#8203;</span
                        >

                        <div
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        >
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                                    >
                                        <h3
                                            class="text-lg leading-6 font-medium text-gray-900"
                                            id="modal-title"
                                        >
                                            Delete Post
                                        </h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">
                                                Are you sure you want to delete
                                                this post?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                            >
                                <button
                                    type="button"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="deletePost"
                                >
                                    Delete
                                </button>
                                <button
                                    type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                    @click="showConfirmation = false"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
